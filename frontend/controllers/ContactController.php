<?php
namespace frontend\controllers;

use frontend\models\Mahasiswa;
use Yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Profile controller
 */
class ContactController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

}
