<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'test-doctis',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'vllx7AqTt9eqDglP_-lKU3qwUPeUa8hd',
            'enableCsrfValidation' => true
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'converter' => [
                'class' => 'nizsheanez\assetConverter\Converter',
                'parsers' => [
                    'scss' => [
                        'class' => 'nizsheanez\assetConverter\Scss',
                        'output' => 'css', // parsed output file type
                        'options' => [
                            'enableCompass' => true, // default is true
                            'importPaths' => [], // import paths, you may use path alias here,
                            'lineComments' => false, // if true — compiler will place line numbers in your compiled output
                            'outputStyle' => 'nested', // May be `compressed`, `crunched`, `expanded` or `nested`,
                        ],
                    ],
                ]
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern' => '/task/index',
                    'route' => 'task/index',
                ],
                [
                    'pattern' => '/task/delete',
                    'route' => 'task/delete',
                ],
                [
                    'pattern' => '/task/create',
                    'route' => 'task/create',
                ],
                [
                    'pattern' => '/task/<id>',
                    'route' => 'task/update',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
