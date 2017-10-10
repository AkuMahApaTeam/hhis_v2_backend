<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "NilaiController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class NilaiController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Nilai';
}
