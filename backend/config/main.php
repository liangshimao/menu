<?php

require (__DIR__ . '/constant.php');

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/params.php')
);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'name' => '华通饭庄智能点餐系统',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'index',
    'modules' => [
        'basic' => ['class' => 'backend\modules\basic\BasicModule'], 
        'menu' => ['class' => 'backend\modules\menu\MenuModule'],
        'order' => ['class' => 'backend\modules\order\OrderModule'],
        'api' => ['class' => 'backend\modules\api\ApiModule'],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'Joy6w5Z_l-w6HIVv13B70X4zoIVfPG4u',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            //'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

//if (YII_ENV_DEV) {
//    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//    ];
//
//    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = [
//        'class' => 'yii\gii\Module',
//    ];
//}

return $config;
