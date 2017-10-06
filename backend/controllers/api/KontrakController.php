<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "KontrakController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class KontrakController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MasterKontrak';
}
