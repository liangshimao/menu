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
use common\components\Image;
use common\components\OutPut;
use common\models\menu\Food;
use common\models\menu\Type;
use yii\helpers\Url;

class FoodController extends BaseController
{
    public function actionIndex()
    {
        $params = $this->request->get();
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Food::getAll($params,$pageSize);
        $typeList = Type::getList();
        return $this->render('index', [
            'info' => $info['data'],
            'params' => $params,
            'pages' => $info['pages'],
            'typeList' => $typeList,
        ]);
    }

    public function actionAdd()
    {
        if($this->request->isPost){
            $info = $this->request->post('food');
            $info['add_time'] = $this->datetime;
            $info['edit_time'] = $this->datetime;
            if(Food::addRecord($info)){
                ShowMessage::info('添加成功','',Url::toRoute(['index']),'edit');
            }else{
                ShowMessage::info('添加失败');
            }
        }
        $typeList = Type::getList();
        return $this->render('add',[
            'typeList' => $typeList,
        ]);
    }

    public function actionEdit($id)
    {
        if($this->request->isPost){
            $info = $this->request->post('food');
            $info['edit_time'] = $this->datetime;
            if(Food::editRecord($id,$info)){
                ShowMessage::info('修改成功','',Url::toRoute(['index']),'edit');
            }else{
                ShowMessage::info('修改失败');
            }
        }
        $model = Food::findOne($id);
        $typeList = Type::getList();
        return $this->render('edit',[
            'model' => $model,
            'typeList' => $typeList,
        ]);
    }

    public function actionDelete($id)
    {
        if(Food::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }else{
            ShowMessage::info('删除失败');
        }
    }

    /**
     * ajax上传图片
     */
    public function actionUpload()
    {
        $imgPath = Image::upload($_FILES['thumb_file']);
        if(!empty($imgPath)){
            OutPut::returnJson('上传成功',200,['url' => $imgPath]);
        }else{
            OutPut::returnJson('上传失败',201);
        }

    }
}