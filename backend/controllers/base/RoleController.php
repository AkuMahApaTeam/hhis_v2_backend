<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\controllers\base;

use app\models\Action;
use app\models\base\RoleMenu;
use app\models\Role;
use app\models\RoleSearch;
use app\models\User;
use Yii;
use yii\base\Component;
use yii\db\Command;
use yii\db\Query;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use backend\components\RoleControl;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

    /**public function behaviors()
    {

        return RoleControl::getAllowedAction();
    }

    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch;
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
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Role;

        try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
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


    public function actionSetting($id){
        $model = $this->findModel($id);
        $urole = $id;

        if(\Yii::$app->request->post()){
            extract(\Yii::$app->request->post());
            $m = @$menu;

            if(!empty($m)){
                RoleMenu::deleteAll(['role'=>$urole]);

                for ($i=0;$i<sizeof($m);$i++){
                    $men = RoleMenu::find()->where(['menu'=>$menu[$i],'role'=>$urole])->count();

                    if($men==0){
                        \Yii::$app->db->createCommand()->insert('role_menu',[
                            'menu'=>$menu[$i],
                            'role'=>$urole
                        ])->execute();
                    }

                }
            } else {
                RoleMenu::deleteAll(['role'=>$urole]);
            }

            $act = @$_POST['action'];
            if(!empty($act)){

                Action::deleteAll(['role'=>$urole]);
                foreach ($act as $action){
                    $real_act = explode("/",$action);
                    $men = Action::find()->where(['menu'=>$real_act[0],'role'=>$urole ,'action'=>$real_act[1] ])->count();
                    if($men==0){

                        \Yii::$app->db->createCommand()->insert('action',[
                            'menu'=>$real_act[0],
                            'role'=>$urole,
                            'action'=>$real_act[1]
                        ])->execute();
                    }

                }

            } else {
                Action::deleteAll(['role'=>$urole]);
            }


        }
        return $this->render("role_setting",[
           "model"=>$model
        ]);
    }
    /**
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
