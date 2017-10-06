<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\dokter\Dokter;
use frontend\models\riwayat\Riwayat;
use frontend\models\pasien\PasienSearch;
use common\models\artikel\Artikel;
use yii\db\ActiveRecord;
use mPDF;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $query = new \yii\db\Query();
        $searchModel = new PasienSearch();
        $model = new Dokter();
        $modellogin = new LoginForm();
        $errors = $searchModel->errors;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $queryArtikel = Artikel::find();
        $pages = new \yii\data\Pagination([
           'totalCount' => $queryArtikel->count(),
           'pageSize' => 3
         ]);
         $showA = $queryArtikel
              ->offset($pages->offset)
              ->limit($pages->Limit)
              ->all();
        return $this->render('index', [
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

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {


        $modellogin = new LoginForm();
        if ($modellogin->load(Yii::$app->request->post()) && $modellogin->validate()) {
          if($modellogin->login()){
          return $this->redirect(['riwayat/index',
              'modellogin' => $modellogin,
          ]);
        }else{
          echo "<script>";
          echo "alert('gagal login')";
          echo "</script>";
          $searchModel = new PasienSearch();
          $model = new Dokter();
          $errors = $modellogin->errors;
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
          return $this->render('index', [
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
        } else {
          echo "<script>";
          echo "alert('gagal login')";
          echo "</script>";
          $searchModel = new PasienSearch();
          $model = new Dokter();
          $errors = $modellogin->errors;
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
          return $this->render('index', [
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
        //  return $this->redirect(['riwayat/index']);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
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
        return $this->render('result', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'showRiwayat' => $showr,
            'showName' => $showname,
            'pages' => $pages,
        ]);
      }else{
          $showr=null;
          $showname=null;
          return $this->render('result', [
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
        $model = new Dokter();
        $modellogin = new LoginForm();
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
        return $this->render('index', [
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


  }
    public function actionViewarticle($id)
    {
      $query = new \yii\db\Query();
      $data = $query->select('*')
      ->from('artikel')
      ->where(['id_artikel'=>$id])
      ->all();
      return $this->render('artikelView', [
          'data' => $data,
      ]);

    }
    public function actionPdf($id_riwayat,$id_pasien) {
        $query = new \yii\db\Query();
        $dataRiwayat = $query->select('*')
        ->from('riwayat')
        ->where(['id_riwayat'=>$id_riwayat])
        ->all();
        foreach ($dataRiwayat as $key => $valueR) {
          $id_dokter = $valueR['id_dokter'];
        }
        $dataDokter = $query->select('*')
        ->from('dokter')
        ->where(['id_dokter'=>$id_dokter])
        ->all();
        foreach ($dataDokter as $key => $valueD) {
          $id_SIP = $valueD['id_no_izin'];
        }
        $dataSIP = $query->select('no_izin')
        ->from('no_izin_dokter')
        ->where(['id_no_izin'=>$id_SIP])
        ->all();
        $dataPasien = $query->select('*')
        ->from('pasien')
        ->where(['id_pasien'=>$id_pasien])
        ->all();

        $mpdf = new mPDF;
        $mpdf->WriteHTML($this->renderPartial('createPdf',['dataRiwayat'=>$dataRiwayat,'dataPasien'=>$dataPasien,'dataDokter'=>$dataDokter,'dataSIP'=>$dataSIP,]));
        $mpdf->Output();
        exit;
    }
}
