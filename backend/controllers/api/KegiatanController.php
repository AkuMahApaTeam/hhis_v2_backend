<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "KegiatanController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class KegiatanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MasterKegiatan';
}
