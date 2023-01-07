<?php
/*return [
    'id' => 'app-backend-tests',
    'components' => [
        'assetManager' => [
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=gymdb_teste',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
    ],
];*/
$config =  yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    [
        'id' => 'app-tests',
        'components' => [
            'db' => [
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=gymdb_teste',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
            ],
            'assetManager' => [
                'basePath' => __DIR__ . '/../web/assets',
            ],
            'urlManager' => [
                'showScriptName' => true,
            ],
            'request' => [
                'cookieValidationKey' => 'test',
            ],
        ]
    ]
);
return $config;