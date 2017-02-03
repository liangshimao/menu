<?php
namespace backend\modules\order\controllers;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\order\Order;

class EatingController extends BaseController
{
    public function actionIndex()
    {
        $tableId = $this->request->get('tableId');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Order::getAll($tableId,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'tableId' => $tableId,
            'pages' => $info['pages'],
        ]);
    }
}