<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
            'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
        'formatter' => [
            'datetimeFormat' => 'php:d/m/Y H:i',
            'currencyCode' => 'EUR',
            'locale' => 'EUR',
        ],
        /*'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'forceCopy' => true,
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'forceCopy' => true,
                ],
            ],
        ],*/
    ],
];
