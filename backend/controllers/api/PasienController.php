<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "PasienController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PasienController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Pasien';
}
