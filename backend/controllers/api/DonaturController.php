<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "DonaturController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class DonaturController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Donatur';
}
