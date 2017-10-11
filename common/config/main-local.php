<?php
if($_SERVER["SERVER_NAME"] == "localhost"){
    $db_conn = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=hhis2',
        'username' => 'hhis2',
        'password' => 'action',
        'charset' => 'utf8',
    ];
}else{
    $db_conn = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=hhis',
        'username' => 'hhis',
        'password' => 'Qwerty123!@#',
        'charset' => 'utf8',
    ];
}
 
return [
    'components' => [
        'db' => $db_conn,
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];

