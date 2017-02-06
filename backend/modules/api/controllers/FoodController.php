<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-6
 * Time: 下午5:35
 */

namespace backend\modules\api\controllers;


use common\components\OutPut;
use common\models\menu\Food;
use yii\web\Controller;

class FoodController extends Controller
{
    public function actionList()
    {
        $info = Food::getAll_api();
        OutPut::returnJson('成功',200,$info);
    }
}