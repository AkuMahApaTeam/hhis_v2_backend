<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'homeUrl' => '/hhis2',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@webroot/path/to/uploadfolder',
            'uploadUrl' => '@web/path/to/uploadfolder',
            'imageAllowExtensions' => ['jpg', 'png', 'gif']
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@backend/mail',
            'useFileTransport' => false,//set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                //isi username dengan email
                'username' => '',
                //isi password dengan app password dari gmail yg sudah ditambahkan
                'password' => '',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lcc-hYUAAAAAIMKvGFTwi5fSXjEGhfL4GfcYpWV',
            'secret' => '6Lcc-hYUAAAAAE1aXqLgelxAmUvyM5RYkcJj7j_G',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
         ],
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'backend/web/uploads/mahasiswa/foto',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerBerita' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'backend/web/uploads/berita/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerEvent' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'backend/web/uploads/event/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerSeminar' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'backend/web/uploads/seminar/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'request' => [
            'baseUrl' => '/hhis2',
        ],
        'user' => [
            'identityClass' => 'frontend\models\Mahasiswa',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-frontend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
