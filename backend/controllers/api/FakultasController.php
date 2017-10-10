<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "FakultasController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class FakultasController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Fakultas';
}
