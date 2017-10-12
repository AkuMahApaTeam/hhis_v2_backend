<?php

namespace frontend\controllers;

use Yii;
use frontend\models\riwayat\Riwayat;
use frontend\models\riwayat\RiwayatSearch;
use frontend\models\pasien\PasienSearch;
use frontend\models\pasien\Pasien;
use frontend\models\dokter\Dokter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * RiwayatController implements the CRUD actions for Riwayat model.
 */
class RiwayatController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Riwayat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PasienSearch();
          $errors = $searchModel->errors;
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'errorMess' => $errors,
          //  'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSearch()
    {

      $searchModel = new PasienSearch();
       if($searchModel->load(\Yii::$app->request->get()) && $searchModel->validate()){
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelProvider=$dataProvider->getModels();
        if($modelProvider!=null){
        foreach ($modelProvider as $data2) {
          $idp = $data2['id_pasien'];
        }

         $query = new \yii\db\Query();
         $queryRiwayat = Riwayat::find()
         ->where(['id_pasien'=>$idp]);

         $pages = new \yii\data\Pagination([
            'totalCount' => $queryRiwayat->count(),
            'pageSize' => 5
          ]);
         $showr = $queryRiwayat
              ->offset($pages->offset)
              ->limit($pages->Limit)
              ->all();
        if($showr!=null){
        foreach ($showr as $showR) {
          $id_dokter = $showR['id_dokter'];
        }
        $showname = $query->select(['nama_dokter'])
        ->from('dokter')
        ->where(['id_dokter' => ''.$id_dokter.''])
        ->all();
        return $this->render('hasil', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'showRiwayat' => $showr,
            'showName' => $showname,
            'pages' => $pages,
        ]);
      }else{
        $showr=null;
        $showname=null;
        return $this->render('hasil', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'showRiwayat' => $showr,
            'showName' => $showname,
            'pages' => $pages,
        ]);
      }

      }else{
        return $this->render('errorSite');
      }

      }else{
        $errors = $searchModel->errors;
        $searchModel = new PasienSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
          'errorMess' => $errors,
        ]);

      }
    }

    /**
     * Displays a single Riwayat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Riwayat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$username_dokter)
    {
        $model = new Riwayat();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->id_riwayat]);
          }else{}
        } else {
            $errorMess = $model->errors;
            $modelPasien = $this->findModelPasien($id);
             $query = new \yii\db\Query();
             $showId = $query->select('id_dokter')->from('dokter')->where(['nama_dokter'=>$username_dokter])->one();

             foreach ($showId as $val) {
              $id_dokter = $val[0];
             }
            $modelDokter = $this->findModelDokter($id_dokter);
            return $this->render('create', [
                'model' => $model,
                'modelPasien' => $modelPasien,
                'modelDokter' => $modelDokter,
                'errorMess' => $errorMess,
            ]);
        }
    }

    /**
     * Updates an existing Riwayat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_riwayat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Riwayat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Riwayat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Riwayat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Riwayat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelPasien($id)
    {
        if (($model = Pasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelDokter($id)
    {
        if (($model = Dokter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
