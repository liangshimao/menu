<?php


/**
 * 图片上传及显示类
 * Class Image
 * @package common\components
 */
namespace common\components;
use yii\base\Component;
use Yii;
use common\components\bmob\BmobFile;

class Image extends Component
{
    const IMG_DOMAIN = 'http://file.bmob.cn/';

    public static function upload($file)
    {
        $suffix = pathinfo($file['name'],PATHINFO_EXTENSION);
        if($suffix != 'jpg' && $suffix != 'png'){
            return false;
        }
        
        $dir = Yii::getAlias('@app') . '/../data/images/';
        if(!is_dir($dir)){
            mkdir($dir,0777,true);
        }
        $file_name = date('YmdHis',time()) . mt_rand('10000','99999'). '.' .$suffix;
        move_uploaded_file($file["tmp_name"], $dir.$file_name);
        $bmobFile = new BmobFile();

        //第一个参数是文件的名称,第二个参数是文件的url(可以是本地路径,最终是通过file_get_contents获取文件内容)
        $res=$bmobFile->uploadFile2($file["name"],$dir.$file_name);
        unlink($dir.$file_name);
        return $res->url;
    }

}