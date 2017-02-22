<?php
namespace backend\modules\order\controllers;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\components\OutPut;
use common\models\menu\Type;
use common\models\order\Order;
use common\models\order\OrderDetail;
use yii\helpers\Url;

class EatingController extends BaseController
{
    public function actionIndex()
    {
        $tableId = $this->request->get('tableId',0);
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Order::getAll($tableId,$pageSize,true);
        return $this->render('index', [
            'info' => $info['data'],
            'tableId' => $tableId,
            'pages' => $info['pages'],
        ]);
    }
    
    public function actionAdd()
    {
        if($this->request->isPost){
            $tableId = $this->request->post('table');
            $detail = $this->request->post('detail');
            $orderModel = new Order();
            $orderModel->setAttributes([
                'table_id' => $tableId,
                'start_time' => $this->datetime,
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
            ShowMessage::info('修改成功','',Url::toRoute(['index']),'edit');
        }
        $typeList = Type::getList();
        return $this->render('add',[
            'typeList' => $typeList,
        ]);
    }
    
    public function actionEdit($id)
    {
        if($this->request->isPost){
            $tableId = $this->request->post('table');
            $detail = $this->request->post('detail');
            $orderModel = Order::findOne($id);
            if($orderModel->table_id != $tableId){
                Order::editRecord($id,['table_id'=>$tableId]);
            }
            OrderDetail::deleteAll(['order_id' => $id]);
            foreach ($detail as $value){
                $value['count'] = intval($value['count']);
                if(empty($value['food_id']) || empty($value['count'])){
                    continue;
                }
                $value['order_id'] = $orderModel->id;
                OrderDetail::addRecord($value);
            }
            ShowMessage::info('修改成功','',Url::toRoute(['index']),'edit');
        }
        $orderModel = Order::findOne($id);
        $detailList = OrderDetail::getList($id);
        $typeList = Type::getList();
        return $this->render('edit',[
            'typeList' => $typeList,
            'orderModel' => $orderModel,
            'detailList' => $detailList,
        ]);
    }
    
    public function actionInfo($id)
    {
        $list = OrderDetail::getList($id);
        return $this->render('info',[
            'list' => $list,
            'orderId' => $id,
        ]);
    }

    /**
     * 结算
     * @param $id
     */
    public function actionAccount($id)
    {
        $param = [
            'status'=> 1,
            'end_time' => $this->datetime,
        ];
        if(Order::editRecord($id,$param)){
            ShowMessage::info('结算成功','',Url::toRoute(['index']),'edit');
        }

    }

    /**
     * 删除
     * @param $id
     */
    public function actionDelete($id)
    {
        if(Order::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }else{
            ShowMessage::info('删除失败');
        }
    }

    public function actionPrint_ajax()
    {
        if(!$this->request->isAjax){
            OutPut::returnJson('非法请求',201);
        }
        $orderId = $this->request->post('orderId');
        if(Order::editRecord($orderId,['print' => 1])){
            OutPut::returnJson('修改成功',200);
        }else{
            OutPut::returnJson('修改失败',201);
        }

    }
    
}