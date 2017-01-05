<?php

/**
 * 验证类
 * Class Validate
 * @package common\components
 */
namespace common\components;
use yii\base\Component;
class Validate  extends Component{

    /**
     * 验证是否为手机号
     * @param $mobilePhone
     * @return bool
     */
    public static function isMobilePhone($mobilePhone) {
        return preg_match("/^1[3578][0-9]{9}$/", $mobilePhone);
    }

    public static function isTelePhone($telephone){
        return preg_match("/^[0-9][0-9-]*$/", $telephone);
    }

    /**
     * 验证是否为有效的ip
     * @param $ip ip
     * @return bool
     */
    public static function isIp($ip){

        return filter_var($ip, FILTER_VALIDATE_IP);
    }

    /**
     * 验证是否为有效的email
     * @param $email email
     * @return bool
     */
    public static function isEmail($email){

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * 验证是否为有效的url
     * @param $url $url
     * @return bool
     */
    public static function isUrl($url){

        return filter_var($url, FILTER_VALIDATE_URL);
    }

    /**
     * 开 发：李效宾
     * 时 间：2016-06-14
     * 参 数：$date 日期
     * 说 明：验证是否为日期格式 例如：2016-01-01
     * 返 回：true or false
    */
    public static function isDate($date){
        if(!empty($date)){
            return preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $date);
        }else{
            return false;
        }
    }
}
