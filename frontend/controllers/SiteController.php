<?php
namespace frontend\controllers;

use app\models\Mahasiswa;
use frontend\components\NodeLogger;
use frontend\models\Berita;
use frontend\models\MasterDonasi;
use frontend\models\Event;
use frontend\models\Seminar;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                    'logout' => ['post', 'get'],
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
        $modelEvent = Event::find()->limit(6)->orderBy(['tanggal' => SORT_DESC])->all();
        $modelBerita = Berita::find()->orderBy(['tanggal' => SORT_DESC])->limit(6)->all();
        return $this->render('index', [
            'modelEvent' => $modelEvent,
            'modelBerita' => $modelBerita
        ]);

    }

    public function actionBulana()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = $this->findModel($id);
            $modelEnda = MasterDonasi::find()->orderBy(['id' => SORT_ASC])->one();
            $model->donasi_rutin = '1';
            $model->jumlah_donasi = $modelEnda->nilai;
            if ($model->save()) {
                return $this->redirect(['endowment/detailmonthly/']);
            }
        }
    }
    public function actionBulanb()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = $this->findModel($id);
            $modelEndb = MasterDonasi::find()->limit(1)->orderBy(['id' => SORT_ASC])->offset('1')->one();
            $model->donasi_rutin = '1';
            $model->jumlah_donasi = $modelEndb->nilai;
            NodeLogger::sendLog($model->nama_lengkap);
            if ($model->save()) {
                return $this->redirect(['endowment/detailmonthly/']);
            }
        }
    }
    public function actionOnea()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = new Donasi();
            $modelEnda = MasterDonasi::find()->orderBy(['id' => SORT_ASC])->one();
            $model->id_mahasiswa = $id;
            $model->jumlah = $modelEnda->nilai;
            $model->tgl_donasi = date('Y-m-d');
            if ($model->save()) {
                return $this->redirect(['endowment/detailone/']);
            }
        }

    }

    public function actionOneb()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = new Donasi();
            $modelEndb = MasterDonasi::find()->limit(1)->orderBy(['id' => SORT_ASC])->offset('1')->one();
            $model->id_mahasiswa = $id;
            $model->jumlah = $modelEndb->nilai;
            $model->tgl_donasi = date('Y-m-d');
            if ($model->save()) {
                return $this->redirect(['endowment/detailone/']);
            }
        }

    }
    public function actionDetailone()
    {
        $cek = Yii::$app->user->identity->id;
        $model = Donasi::find()->where(['id_mahasiswa' => $cek])->andWhere(['valid' => 1])->orderBy(['id' => SORT_DESC])->one();
        return $this->render('detailone', [
            'model' => $model
        ]);
    }

    public function actionDetailmonthly()
    {
        $cek = Yii::$app->user->identity->id;
        $model = Mahasiswa::find()->where(['id' => $cek])->one();
        return $this->render('detailmonthly', [
            'model' => $model
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
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
                $this->actionLogout();
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
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
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
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
