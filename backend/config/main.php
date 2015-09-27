<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'request' => [
            'class' => '\yii\web\Request',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/event-type'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/country'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/fixture'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/fixture-event'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/fixture-player'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/player'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/player-status'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/position'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/season'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/season-team'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/squad'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/team'],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/stad'],
            ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
