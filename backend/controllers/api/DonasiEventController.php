<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "DonasiEventController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class DonasiEventController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\DonasiEvent';
}
