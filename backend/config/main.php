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
            // Registar as rotas para a API
            'rules' => [
                // Exercicios do plano
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/exercicio-plano',
                    'pluralize' => false,

                    'extraPatterns' =>[
                        'GET get-exercicios-plano/{idPlano}' => 'get-exercicios-plano',
                        'GET get-exercicio-detalhes/{idExercicioPlano}' => 'get-exercicio-detalhes',
                        'GET parameterizacao-cliente/{idExercicioPlano}' => 'parameterizacao-cliente',
                    ],
                    'tokens' => [
                        '{idPlano}' => '<idPlano:\\d+>',
                        '{idExercicioPlano}' => '<idExercicioPlano:\\d+>',
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

                // Inscricoes
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/inscricoes',
                    'pluralize' => false,

                    'extraPatterns' =>[
                        'POST inscrever/{idAula}' => 'inscrever',
                        'DELETE remover-inscricao/{idInscricao}' => 'remover-inscricao',
                    ],
                    'tokens' => [
                        '{idAula}' => '<idAula:\\d+>',
                        '{idInscricao}' => '<idInscricao:\\d+>',
                    ],
                ],

                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'api/agua',
                    'pluralize' => false,

                    'extraPatterns' =>[
                        'PUT editar-registo/{idAgua}' => 'editar-registo',
                        'DELETE remover-registo/{idAgua}' => 'remover-registo',
                    ],
                    'tokens' => [
                        '{idAgua}' => '<idAgua:\\d+>',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
