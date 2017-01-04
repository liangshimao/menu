<?php

/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-1-4
 * Time: 下午2:12
 */
namespace common\models\menu;
use yii\db\ActiveRecord;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

class Type extends ActiveRecord
{
    public static function tableName()
    {
        return 'menu_type';
    }

    public static function tableDesc(){
        return '菜品类型';
    }
    
    public static function getAll($name = '',$pageSize)
    {
        $query = self::find()->where(['del_flag' => DEL_FLAG_FALSE]);
        if(!empty($name)){
            $query->andFilterWhere(['like','name',$name]);
        }
        $query->orderBy(['sort' => SORT_ASC,'edit_time'=> SORT_DESC]);
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
        $model->setAttributes(['del_flag' => 1],false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function getList()
    {
        $list = self::find()->where(['del_flag' => DEL_FLAG_FALSE])->all();
        return ArrayHelper::map($list,'id' , 'name');
    }
}