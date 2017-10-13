<?php
if($_SERVER["SERVER_NAME"] == "hhis.tk"){
    $db_conn = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=hhis',
        'username' => 'hhis',
        'password' => 'Qwerty123!@#',
        'charset' => 'utf8',
    ];
}else{
    $db_conn = [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=hhis2',
<<<<<<< HEAD
        'username' => 'root',
        'password' => '',
=======
        'username' => 'hhis2',
        'password' => 'action',
>>>>>>> 69f8bf38bc2befa6078fc891e9a4a9af834b724b
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

