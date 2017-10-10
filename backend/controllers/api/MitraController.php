<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "MitraController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MitraController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MasterMitra';
}
