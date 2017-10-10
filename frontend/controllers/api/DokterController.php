<?php

namespace frontend\controllers\api;

/**
* This is the class for REST controller "DokterController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class DokterController extends \yii\rest\ActiveController
{
public $modelClass = 'frontend\models\Dokter';
}
