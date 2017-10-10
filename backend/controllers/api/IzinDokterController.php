<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "IzinDokterController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class IzinDokterController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\IzinDokter';
}
