<?php
namespace frontend\controllers;

use frontend\models\Berita;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\HttpException;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
/**
 * News controller
 */
class NewsController extends Controller
{
    public function actionIndex()
    {
        $model = Berita::find()->orderBy(['tanggal' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);
        return $this->render('index',[
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionDetail($id)
    {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();
        $randB = Berita::find()->orderBy('rand()')->andWhere(['not in','id',[$id]])->limit(3)->all();

        return $this->render('detail', [
            'model' => $this->findModel($id),
            'randB' => $randB
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
