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
class Food extends ActiveRecord
{
    public static function tableName()
    {
        return 'menu_food';
    }

    public static function tableDesc(){
        return '菜品表';
    }


    public static function getAll($params,$pageSize)
    {
        $query = self::find()->where(['del_flag' => DEL_FLAG_FALSE]);
        if(!empty($params['name'])){
            $query->andFilterWhere(['like','name',$params['name']]);
        }
        if(!empty($params['type'])){
            $query->andFilterWhere(['type_id' => $params['type']]);
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
}