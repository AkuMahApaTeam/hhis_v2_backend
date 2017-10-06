<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "MataKuliahController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MataKuliahController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MataKuliah';
}
