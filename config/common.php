<?php

\Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

return [
    'basePath' => dirname(__DIR__),
    'sourceLanguage' => 'en-US',
    'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'cache' => 'yii\caching\FileCache',
        'eventManager' => 'app\components\EventManager',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'app\components\PhpMessageSource',
                ],
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'init' => [
            'class' => 'app\components\Init',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'defaultRoles' => ['admin', 'user'],
        ],
    ],
    'params' => require(__DIR__ . '/params.php'),
];