<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\controllers\base;

use frontend\models\Dokter;
    use frontend\models\DokterSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* DokterController implements the CRUD actions for Dokter model.
*/
class DokterController extends Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all Dokter models.
* @return mixed
*/
public function actionIndex()
{
    $searchModel  = new DokterSearch;
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
* Displays a single Dokter model.
* @param integer $id_dokter
*
* @return mixed
*/
public function actionView($id_dokter)
{
\Yii::$app->session['__crudReturnUrl'] = Url::previous();
Url::remember();
Tabs::rememberActiveState();

return $this->render('view', [
'model' => $this->findModel($id_dokter),
]);
}

/**
* Creates a new Dokter model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
$model = new Dokter;

try {
if ($model->load($_POST) && $model->save()) {
return $this->redirect(['view', 'id_dokter' => $model->id_dokter]);
} elseif (!\Yii::$app->request->isPost) {
$model->load($_GET);
}
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
$model->addError('_exception', $msg);
}
return $this->render('create', ['model' => $model]);
}

/**
* Updates an existing Dokter model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id_dokter
* @return mixed
*/
public function actionUpdate($id_dokter)
{
$model = $this->findModel($id_dokter);

if ($model->load($_POST) && $model->save()) {
return $this->redirect(Url::previous());
} else {
return $this->render('update', [
'model' => $model,
]);
}
}

/**
* Deletes an existing Dokter model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $id_dokter
* @return mixed
*/
public function actionDelete($id_dokter)
{
try {
$this->findModel($id_dokter)->delete();
} catch (\Exception $e) {
$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
\Yii::$app->getSession()->addFlash('error', $msg);
return $this->redirect(Url::previous());
}

// TODO: improve detection
$isPivot = strstr('$id_dokter',',');
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
* Finds the Dokter model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id_dokter
* @return Dokter the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($id_dokter)
{
if (($model = Dokter::findOne($id_dokter)) !== null) {
return $model;
} else {
throw new HttpException(404, 'The requested page does not exist.');
}
}
}
