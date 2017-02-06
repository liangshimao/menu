<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-6
 * Time: 下午5:36
 */

namespace backend\modules\api\controllers;


use common\components\OutPut;
use common\models\order\Order;
use common\models\order\OrderDetail;
use yii\web\Controller;
use Yii;
class OrderController extends Controller
{
    public function actionAdd()
    {
        if(!Yii::$app->request->isPost){
            OutPut::returnJson('此接口只能通过post方式',201);
        }
        $tableId = Yii::$app->request->post('table');
        $detail = Yii::$app->request->post('detail');
        $orderModel = new Order();
        $orderModel->setAttributes([
            'table_id' => $tableId,
            'start_time' => date('Y-m-d H:i:s'),
        ],false);
        $orderModel->save();
        foreach ($detail as $value){
            $value['count'] = intval($value['count']);
            if(empty($value['food_id']) || empty($value['count'])){
                continue;
            }
            $value['order_id'] = $orderModel->id;
            OrderDetail::addRecord($value);
        }
        OutPut::returnJson('保存成功!');
    }
}