<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;

use app\models\Riwayat;
use app\models\Pasien;
use app\models\Dokter;
use backend\models\RiwayatSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* RiwayatController implements the CRUD actions for Riwayat model.
*/
class RiwayatController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all Riwayat models.
* @return mixed
*/
public function actionIndex()
{
    $searchModel  = new RiwayatSearch;
    $dataProvider = $searchModel->search($_GET);

Tabs::clearLocalStorage();

Url::remember();
\Yii::$app->session['__crudReturnUrl'] = null;

return $this->render('index', [
'dataProvider' => $dataProvider,
    'searchModel' => $searchModel,
]);
}
    public function actionDetail($id)
    {
        // $mitra = MasterMitra::findOne($dataMitra['id']);


        //            $kontrak = $mitra-> getMasterKontraks()->andWhere('status=1')->andWhere('flag=1')->all();
        $searchModel = new RiwayatSearch;
        $dataProvider = $searchModel->searchDetail($_GET, $id);
        $modelPasien = $this->findModelPasien($id);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'modelPasien' => $modelPasien,
        ]);
    }

/**
* Displays a single Riwayat model.
* @param integer $id_riwayat
*
* @return mixed
*/
public function actionView($id_riwayat)
{
\Yii::$app->session['__crudReturnUrl'] = Url::previous();
Url::remember();
Tabs::rememberActiveState();

return $this->render('view', [
'model' => $this->findModel($id_riwayat),
]);
}

/**
* Creates a new Riwayat model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate($id,$username)
{
	
$model = new Riwayat;

try {
if ($model->load($_POST) &&  $model->validate() && $model->save()) {

return $this->redirect(['detail','id'=>$id]);
} elseif (!\Yii::$app->request->isPost) {
$model->load($_GET);
 $modelPasien = $this->findModelPasien($id);
  $query = new \yii\db\Query();
             $showId = $query->select('id_dokter')->from('dokter')->where(['email'=>$username])->one();

             foreach ($showId as $val) {
              $id_dokter = $val[0];
             }
            $modelDokter = $this->findModelDokter($id_dokter);
}
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
$model->addError('_exception', $msg);
}
 $modelPasien = $this->findModelPasien($id);
  $query = new \yii\db\Query();
             $showId = $query->select('id_dokter')->from('dokter')->where(['email'=>$username])->one();
             foreach ($showId as $val) {
              $id_dokter = $val[0];
             }
 $modelDokter = $this->findModelDokter($id_dokter);
 
return $this->render('create', 
    [   'model' => $model,
        'modelPasien' => $modelPasien,
        'modelDokter' => $modelDokter,

    ]);
}

/**
* Updates an existing Riwayat model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id_riwayat
* @return mixed
*/
public function actionUpdate($id_riwayat)
{
$model = $this->findModel($id_riwayat);

if ($model->load($_POST) && $model->save()) {
return $this->redirect(Url::previous());
} else {
return $this->render('update', [
'model' => $model,
]);
}
}

/**
* Deletes an existing Riwayat model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $id_riwayat
* @return mixed
*/
public function actionDelete($id_riwayat)
{
try {
$this->findModel($id_riwayat)->delete();
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
\Yii::$app->getSession()->addFlash('error', $msg);
return $this->redirect(Url::previous());
}

// TODO: improve detection
$isPivot = strstr('$id_riwayat',',');
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
* Finds the Riwayat model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id_riwayat
* @return Riwayat the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($id_riwayat)
{
if (($model = Riwayat::findOne($id_riwayat)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
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
