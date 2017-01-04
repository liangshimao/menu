<?php
require (__DIR__ . '/constant.php');
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone'=>'Asia/Chongqing',
    'components' => [
        'db' => require (__DIR__ . '/db.php'),
        'smsDb' => require (__DIR__ . '/smsDb.php'),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
    ],
];
