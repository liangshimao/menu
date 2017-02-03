<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-3
 * Time: 下午6:24
 */

namespace common\models\order;
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
}