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
        $query = self::find();
        if(!empty($tableId)){
            $query->andFilterWhere(['table_id' => $tableId]);
        }
        if($eating){
            $query->andFilterWhere(['status' => 0]);
        }else{
            $query->andFilterWhere(['status' => 1]);
        }
        $query->orderBy(['del_flag' => SORT_ASC,'start_time'=> SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        $info['data'] = $query->offset($pages->offset)->limit($pages->limit)->all();
        $info['pages'] = $pages;
        return $info;
    }
}