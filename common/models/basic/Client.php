<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-7
 * Time: 下午6:58
 */

namespace common\models\basic;


use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    public static function tableName()
    {
        return 'basic_waiter';
    }

    public static function tableDesc(){
        return '服务员表';
    }
    
    public static function addOne($fd)
    {
        $model = self::find()->one();
        if(empty($model)){
            self::addRecord(['fd'=>$fd]);
        }else{
            self::editRecord($model->id,['fd'=>$fd]);
        }
    }
    
    public static function addRecord($info)
    {
        $model = new self();
        $model->setAttributes($info,false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function editRecord($id,$info)
    {
        $model = self::findOne($id);
        if(empty($model)){
            return false;
        }
        $model->setAttributes($info,false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function getFd()
    {
        $model = self::find()->one();
        return $model->fd;
    }
}