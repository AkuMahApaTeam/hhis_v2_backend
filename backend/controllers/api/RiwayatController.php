<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "RiwayatController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class RiwayatController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Riwayat';
}
