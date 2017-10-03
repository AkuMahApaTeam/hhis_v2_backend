<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "JenisKegiatanController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class JenisKegiatanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\JenisKegiatan';
}
