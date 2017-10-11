<?php
/**
 * Created by PhpStorm.
 * User: aal
 * Date: 10/5/17
 * Time: 8:57 AM
 */

namespace api\modules\v1\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;

class TestRestController extends Controller
{
//  behavior untuk akses data harus menggunakan authentication terlebih dahulu
    public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        return $behaviors;
    }
    private function dataList()
    {
        return [
            [ 'id' => 1, 'name' => 'Albert', 'surname' => 'Einstein' ],
            [ 'id' => 2, 'name' => 'Enzo', 'surname' => 'Ferrari' ],
            [ 'id' => 4, 'name' => 'Mario', 'surname' => 'Bros' ]
        ];
    }


    public function actionIndex()
    {
        return $this->dataList();
    }
}