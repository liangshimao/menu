<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-1-6
 * Time: 上午11:29
 */

namespace backend\modules\basic\controllers;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\basic\Waiter;
use yii\helpers\Url;

class WaiterController extends BaseController
{
    public function actionIndex()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Waiter::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }
    
    public function actionLeave()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Waiter::getAll($name,$pageSize,false);
        return $this->render('leave', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd()
    {
        if($this->request->isPost){
            $info = $this->request->post('waiter');
            if(Waiter::addRecord($info)){
                ShowMessage::info('添加成功','',Url::toRoute(['index']),'edit');
            }else{
                ShowMessage::info('添加失败');
            }
        }
        return $this->render('add');
    }

    public function actionEdit($id)
    {
        if($this->request->isPost){
            $info = $this->request->post('waiter');
            if(Waiter::editRecord($id,$info)){
                ShowMessage::info('修改成功','',Url::toRoute(['index']),'edit');
            }else{
                ShowMessage::info('修改失败');
            }
        }
        $model = Waiter::findOne($id);
        return $this->render('edit',[
            'model' => $model,
        ]);
    }

    public function actionDel($id)
    {
        if(Waiter::delRecord($id)){
            ShowMessage::info('操作成功','',Url::toRoute(['index']),'edit');
        }else{
            ShowMessage::info('操作失败');
        }
    }

    public function actionResume($id)
    {
        if(Waiter::resumeRecord($id)){
            ShowMessage::info('操作成功','',Url::toRoute(['leave']),'edit');
        }else{
            ShowMessage::info('操作失败');
        }
    }
}