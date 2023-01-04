<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        // Para aceder ao modulo da API
        'api' => [
            'class' => 'backend\modules\api\ModuleAPI',
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@backend/views'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [ 'application/json' => 'yii\web\JsonParser', ] // Para receber dados em formato Json
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            // Registar as rotas para a API
            'rules' => [
                // Users
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' => false,

                    'extraPatterns' =>[
                        'GET get-perfil/{idClient}' => 'get-perfil',
                    ],
                    'tokens' => [
                        '{idClient}' => '<idClient:\\d+>',
                    ],
                ],
                // Auth
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/auth',
                    'pluralize' => false,

                    // Login
                    'extraPatterns' =>[
                        'GET login' => 'login',
                    ],
                    'tokens' => [
                        '{username}' => '<username:\\w+>',
                        '{password}' => '<password:\\w+>',

                    ],
                ],
                // Planos de treino
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/plano',
                    'pluralize' => false,

                    // GET planos do cliente
                    'extraPatterns' =>[
                        'GET get-planos/{idClient}' => 'get-planos',
                    ],
                    'tokens' => [
                        '{idClient}' => '<idClient:\\d+>',
                        '{plano}' => '<plano:\\d+>',
                    ],
                ],
                // Exercicios do plano
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/exercicioplano',
                    'pluralize' => false,

                    'extraPatterns' =>[
                        'GET exercicios-plano/{idPlano}' => 'exercicios-plano',
                        'GET parameterizacao-cliente/{idExercicio}' => 'parameterizacao-cliente',
                    ],
                    'tokens' => [
                        '{idPlano}' => '<idPlano:\\d+>',
                        '{idExercicio}' => '<idExercicio:\\d+>',
                        '{plano}' => '<plano:\\d+>',
                    ],
                ],
                // Parameteriacao
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/parameterizacao',
                    'pluralize' => false,

                    'extraPatterns' =>[
                        'PUT atualizar-parameterizacao-cliente/{idParameterizacao}' => 'atualizar-parameterizacao-cliente',
                    ],
                    'tokens' => [
                        '{idParameterizacao}' => '<idParameterizacao:\\d+>',
                    ],
                ],
            ],

        ],


    ],
    'params' => $params,
];
