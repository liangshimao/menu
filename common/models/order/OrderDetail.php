<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-3
 * Time: 下午6:24
 */

namespace common\models\order;
use common\models\menu\Food;
use yii\db\ActiveRecord;

class OrderDetail extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_order_detail';
    }

    public static function tableDesc()
    {
        return '订单详情表';
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

    public static function getList($order_id)
    {
        return self::find()->where(['order_id'=>$order_id])->all();
    }

    public function getFood()
    {
        return $this->hasOne(Food::className(), ['id' => 'food_id']);
    }
    
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public static function getSum($order_id)
    {
        $list = self::getList($order_id);
        $sum = 0;
        foreach ($list as $val){
            $s = isset($val->food->price)?$val->food->price:0;
            $sum += $s * $val->count;
        }
        return $sum;
    }
}