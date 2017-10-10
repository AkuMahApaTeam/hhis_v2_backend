<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "ArtikelController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ArtikelController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Artikel';
}
