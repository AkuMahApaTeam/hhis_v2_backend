<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],

    /*
    * This module section makes it easy to version the API section of code
    */

    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'   // here is our v1 modules
        ],

        'v2' => [
            'basePath' => '@app/modules/v2',
            'class' => 'api\modules\v2\Module'   // here is our v2 modules and so on
        ],
    ],

    'components' => [
        // 'user' => [
        //     'identityClass' => 'common\models\UserIdentity',
        //     'enableAutoLogin' => false,
        //     'enableSession' => false,
        //     'loginUrl' => null,
        // ],
        'user' => [
            'identityClass' => '\api\modules\v1\models\User',
            //'enableAutoLogin' => true,
            'enableSession' => false,
            'loginUrl' => null,
            //'authTimeout' => 60*30,
        ],
        'request' => [
            'parsers' => [
            'application/json' => 'yii\web\JsonParser',
          ]
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

		/*
		* Allows wrapping of server responses in an envelope if suppress_response_code is in the get params
		* Tip : When in DEBUG mode you will get extra data from exceptions/errors in the response. Change
		* `suppress_response_code` to what ever your trigger may be for it.
		*/

        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
        ],

        /*
        * Use the default handler. If you want to override this behavior
        * just point this to the action you want to handle the error.
        */

        'errorHandler' => [
 //           'errorAction' => 'site/error',	// action handler
        ],

		'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/country',   // our test country api rule handles 1 id parameter
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/test-rest',   // our test country api rule handles 1 id parameter
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/sample',   // our simple rest api rule
                    'tokens' => [
                        '{id}' => '<id:(\w+(\,?))+>'	// pattern to capture comma list of stuff in the id:
                    ]
                ],

//				hhis rules of api

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/user',   // our test country api rule handles 1 id parameter
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],


                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/NoIzinDokter',   // our test country api rule handles 1 id parameter
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/artikel',   // our test country api rule handles 1 id parameter
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],


                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/artikelDokter',   // our test country api rule handles 1 id parameter
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/pasien',   // our test country api rule handles 1 id parameter
                    'tokens' => array(
                        '{id}' => '<id:\\w+>'
                    )
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/pasienid',   // our test country api rule handles 1 id parameter
                    'tokens' => array(
                        '{id}' => '<id:\\w+>'
                    )
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/dokter',   // our test country api rule handles 1 id parameter
                    'tokens' => array(
                        '{id}' => '<id:\\w+>'
                    )
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/riwayat',   // our test country api rule handles 1 id parameter
                    'tokens' => array(
                        '{id}' => '<id:\\w+>'
                    )
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/riwayatpa',   // our test country api rule handles 1 id parameter
                    'tokens' => array(
                        '{id}' => '<id:\\w+>'
                    )
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/izin',   // our test country api rule handles 1 id parameter
                    'tokens' => array(
                        '{id}' => '<id:\\w+>'
                    )
                ],

				/*
				* route anything here into our versioned path of stuff...
				* this is typically for controllers that act on Get/Post params directly
				* and use the regular controller (not the rest version)
				* this route will try to match the following url structure -
				*
				* yoursitehere/api/v(version#)/(controller name)/(action name)
				*/

				'v<ver:\d+>/<controller>/<action>' => 'v<ver>/<controller>/<action>',
            ],
        ]
    ],
    'params' => $params,
];
