<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-3
 * Time: 下午4:59
 */

namespace backend\modules\order\controllers;


use backend\controllers\BaseController;
use common\models\order\Order;
use common\models\order\OrderDetail;

class FinishController extends BaseController
{
    public function actionIndex()
    {
        $tableId = $this->request->get('tableId',0);
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Order::getAll($tableId,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'tableId' => $tableId,
            'pages' => $info['pages'],
        ]);
    }

    public function actionInfo($id)
    {
        $list = OrderDetail::getList($id);
        return $this->render('info',[
            'list' => $list,
        ]);
    }
}