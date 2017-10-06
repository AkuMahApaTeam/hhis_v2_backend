<?php

namespace frontend\controllers;

use Yii;
use frontend\models\dokter\Dokter;
use frontend\models\dokter\DokterSearch;
use common\models\User;
use frontend\models\SignupForm;
use common\models\noIzinDokter\NoIzinDokter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use frontend\models\pasien\PasienSearch;
use common\models\artikel\Artikel;

/**
 * DokterController implements the CRUD actions for Dokter model.
 */
class DokterController extends Controller
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
     * Lists all Dokter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DokterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dokter model.
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
     * Creates a new Dokter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dokter();


        if ($model->load(Yii::$app->request->post())) {
            $modelUser = new NoIzinDokter();
            $IdNoIzin = NoIzinDokter::find()->where(['no_izin' => $model->id_no_izin])->One();

            if ($IdNoIzin){
                $model->id_no_izin = $IdNoIzin->id_no_izin;
                if($model->validate()){
                if($model->save()){
                  $user = new User();
                  // $user->id_dokter = $model->getPrimaryKey();
                  $user->username = $model->nama_dokter;
                  $user->email = $model->email;
                  $user->setPassword($model->password);
                  $user->generateAuthKey();
                   $user->save();
                   $searchModel = new PasienSearch();
                   $model = new Dokter();
                   $modellogin = new LoginForm();
                   $errors = $searchModel->errors;
                   $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                   $query = new \yii\db\Query();
                   $queryArtikel = Artikel::find();
                   $pages = new \yii\data\Pagination([
                      'totalCount' => $queryArtikel->count(),
                      'pageSize' => 3
                    ]);
                    $showA = $queryArtikel
                         ->offset($pages->offset)
                         ->limit($pages->Limit)
                         ->all();
                   echo "<script>";
                   echo "alert('register berhasil')";
                   echo "</script>";
                   return $this->render('/site/index',[
                       'model' => $model,
                       'modellogin' => $modellogin,
                       'dataProvider' => $dataProvider,
                       'searchModel' => $searchModel,
                       'errorMess' => $errors,
                       'errorM' => null,
                       'showArtikel'=>$showA,
                       'pages'=>$pages,


                   ]);
                }
              }else{
                echo "<script>";
                echo "alert('register gagal')";
                echo "</script>";
                $searchModel = new PasienSearch();
                $modellogin = new LoginForm();
                $errors = $model->errors;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $query = new \yii\db\Query();
                $queryArtikel = Artikel::find();
                $pages = new \yii\data\Pagination([
                   'totalCount' => $queryArtikel->count(),
                   'pageSize' => 3
                 ]);
                 $showA = $queryArtikel
                      ->offset($pages->offset)
                      ->limit($pages->Limit)
                      ->all();
                return $this->render('/site/index',[
                    'model' => $model,
                    'modellogin' => $modellogin,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'errorMess' => $errors,
                    'errorM' => null,
                    'showArtikel'=>$showA,
                    'pages'=>$pages,


                ]);
              }
            } else{
              echo "<script>";
              echo "alert('register gagal')";
              echo "</script>";
              $searchModel = new PasienSearch();
              $modellogin = new LoginForm();
              $errors = $model->errors ;
              $er ="SIP salah";
              $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
              $query = new \yii\db\Query();
              $queryArtikel = Artikel::find();
              $pages = new \yii\data\Pagination([
                 'totalCount' => $queryArtikel->count(),
                 'pageSize' => 3
               ]);
               $showA = $queryArtikel
                    ->offset($pages->offset)
                    ->limit($pages->Limit)
                    ->all();
              return $this->render('/site/index',[
                  'model' => $model,
                  'modellogin' => $modellogin,
                  'dataProvider' => $dataProvider,
                  'searchModel' => $searchModel,
                  'errorM' => $er ,
                    'errorMess' => $errors,
                    'showArtikel'=>$showA,
                    'pages'=>$pages,


              ]);


            }

        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Dokter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_dokter]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dokter model.
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
     * Finds the Dokter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dokter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dokter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
