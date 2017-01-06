<?php

/**
 * Created by PhpStorm.
 * User: smile
 * Date: 16-12-6
 * Time: 下午5:33
 */
namespace common\models\basic;
use yii\db\ActiveRecord;
use yii\data\Pagination;
class Waiter extends ActiveRecord
{
    public static function tableName()
    {
        return 'basic_waiter';
    }

    public static function tableDesc(){
        return '服务员表';
    }

    /**
     * @param string $name
     * @param $pageSize
     * @param bool $doing 是否在职中，true表示在职 false表示离职了
     * @return mixed
     */
    public static function getAll($name = '',$pageSize,$doing = true)
    {
        if($doing){
            $query = self::find()->where(['status' => 1])->orderBy(['sort' => SORT_ASC,'id'=> SORT_ASC]);
        }else{
            $query = self::find()->where(['status' => 0])->orderBy(['leave_time' => SORT_DESC]);
        }

        if(!empty($name)){
            $query->andFilterWhere(['like','name',$name]);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        $info['data'] = $query->offset($pages->offset)->limit($pages->limit)->all();
        $info['pages'] = $pages;
        return $info;
    }

    public static function addRecord($info)
    {
        $model = new self();
        $model->setAttributes($info,false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function editRecord($id,$info)
    {
        $model = self::findOne($id);
        if(empty($model)){
            return false;
        }
        $model->setAttributes($info,false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function delRecord($id)
    {
        $model = self::findOne($id);
        if(empty($model)){
            return false;
        }
        $model->setAttributes([
            'status' => 0,
            'leave_time' => date('Y-m-d',time()),
        ],false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function resumeRecord($id)
    {
        $model = self::findOne($id);
        if(empty($model)){
            return false;
        }
        $model->setAttributes([
            'status' => 1,
            'add_time' => date('Y-m-d',time()),
        ],false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }
}