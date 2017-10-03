<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "MahasiswaController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MahasiswaController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Mahasiswa';
}
