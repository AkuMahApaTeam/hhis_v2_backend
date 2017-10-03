<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "LokerController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class LokerController extends \yii\rest\ActiveController
{
public $modelClass = 'backend\models\Loker';
}
