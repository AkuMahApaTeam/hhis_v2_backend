<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class RegisController extends Controller
{
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('signup');
    }
    // public function actionPasienpage(){
        
    // }

        public function actionDoktersign()
    {
       $model = new Dokter();
       return $this->render('signup');
     
    }

   
}
