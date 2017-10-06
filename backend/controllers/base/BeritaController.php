<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;

use app\models\Berita;
use app\models\BeritaSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use yii\web\UploadedFile;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;


    /**
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaSearch;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Berita model.
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Berita;

        try {
            if ($model->load($_POST)) {
                $foto = UploadedFile::getInstance($model, 'gambar');
                $model->tanggal = date("d-M-Y");
                if ($foto != NULL) {
                    $model->gambar = $foto->name;
                    $arr = explode(".", $foto->name);
                    $extension = end($arr);
                    $model->gambar = \Yii::$app->security->generateRandomString() . ".{$extension}";
                    $path = \Yii::getAlias("@frontend/web/uploads/berita/") . $model->gambar;
                    $foto->saveAs($path);
                }
                if ($foto == NULL) {
                    $model->gambar = "default.png";
                }

                if ($model->save()) {
                    \Yii::$app->session->addFlash("success", "Data Tersimpan.");
                    return $this->redirect(['view', 'id' => $model->id]);
                } elseif (!\Yii::$app->request->isPost) {
                    $model->load($_GET);
                }
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFoto = $model->gambar;
        if ($model->load($_POST)) {
            $foto = UploadedFile::getInstance($model, 'gambar');
            if ($foto != NULL) {
                $model->gambar = $foto->name;
                $arr = explode(".", $foto->name);
                $extension = end($arr);
                $model->gambar = \Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = \Yii::getAlias("@frontend/web/uploads/berita/") . $model->gambar;
                $foto->saveAs($path);
            } else {
                $model->gambar = $oldFoto;
            }
            if ($model->save()) {
                \Yii::$app->session->addFlash("success", "Data Berita successfully updated.");
            } else {
                \Yii::$app->session->addFlash("danger", "Data Berita cannot updated.");
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

// TODO: improve detection
        $isPivot = strstr('$id', ',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
            Url::remember(null);
            $url = \Yii::$app->session['__crudReturnUrl'];
            \Yii::$app->session['__crudReturnUrl'] = null;

            return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
