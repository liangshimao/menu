<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-22
 * Time: 下午4:06
 */

namespace frontend\controllers;


use common\components\OutPut;
use common\models\menu\Food;
use common\models\menu\Type;
use common\models\order\Order;
use common\models\order\OrderDetail;
use Yii;
class IndexController extends BaseController
{
    public function actionIndex()
    {
        $type = Type::getList();
        $food = Food::getAll_api();
        return $this->renderPartial('index',[
            'type' => $type,
            'food' => $food,
        ]);
    }

    public function actionOrder_ajax()
    {
        if(!Yii::$app->request->isAjax){
            OutPut::returnJson('非法请求',201);
        }
        $food = Yii::$app->request->post('food');
        $table = Yii::$app->request->post('table');

        $orderModel = new Order();
        $orderModel->setAttributes([
            'table_id' => $table,
            'start_time' => date('Y-m-d H:i:s'),
        ],false);
        $orderModel->save();
        foreach ($food as $key => $value){
            if($value['value'] == 0){
                continue;
            }
            OrderDetail::addRecord([
                'order_id' => $orderModel->id,
                'food_id' => $value['name'],
                'count' => $value['value'],
            ]);
        }
        OutPut::returnJson('保存成功',200);
    }
}