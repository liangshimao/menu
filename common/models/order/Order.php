<?php
namespace common\models\order;
use yii\data\Pagination;
use yii\db\ActiveRecord;
class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_order';
    }

    public static function tableDesc()
    {
        return '订单';
    }

    public static function getAll($tableId = 0,$pageSize,$eating = false)
    {
        $query = self::find()->where(['del_flag' => DEL_FLAG_FALSE]);
        if(!empty($tableId)){
            $query->andFilterWhere(['table_id' => $tableId]);
        }
        if($eating){
            $query->andFilterWhere(['status' => 0])->orderBy(['start_time'=> SORT_DESC]);
        }else{
            $query->andFilterWhere(['status' => 1])->orderBy(['end_time'=> SORT_DESC]);
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
        $model->setAttributes(['del_flag' => 1],false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    
}