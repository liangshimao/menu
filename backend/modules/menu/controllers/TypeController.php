<?php

/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-1-4
 * Time: 下午2:08
 */
namespace backend\modules\menu\controllers;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\menu\Type;
use yii\helpers\Url;

class TypeController extends BaseController
{
    public function actionIndex()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Type::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd()
    {
        if($this->request->isPost){
            $info = $this->request->post('type');
            $info['add_time'] = $this->datetime;
            $info['edit_time'] = $this->datetime;
            if(Type::addRecord($info)){
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
            $info = $this->request->post('type');
            $info['edit_time'] = $this->datetime;
            if(Type::editRecord($id,$info)){
                ShowMessage::info('修改成功','',Url::toRoute(['index']),'edit');
            }else{
                ShowMessage::info('修改失败');
            }
        }
        $model = Type::findOne($id);
        return $this->render('edit',[
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(Type::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }else{
            ShowMessage::info('删除失败');
        }
    }
}