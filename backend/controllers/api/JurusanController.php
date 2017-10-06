<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "JurusanController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class JurusanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Jurusan';
}
