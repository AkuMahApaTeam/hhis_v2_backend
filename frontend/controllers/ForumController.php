<?php
namespace frontend\controllers;

use frontend\components\NodeLogger;
use frontend\models\Forum;
use frontend\models\KategoriForum;
use frontend\models\KomentarForum;
use frontend\models\Mahasiswa;
use frontend\models\MahasiswaSearch;
use frontend\models\RoleMenu;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\rbac\Role;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\HttpException;

/**
 * Profile controller
 */
class ForumController extends Controller
{
    //    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {

            $request = Yii::$app->request;
            $kat = $request->get('kat');
            $connection = Yii::$app->db;
            $sesionID = Yii::$app->user->identity->getId();
            $modelCat = KategoriForum::find()->all();
            $countCat = $connection->createCommand("select kategori_forum.id, kategori_forum.nama_kategori,COUNT( forum.id ) total
                        FROM (kategori_forum
                        LEFT JOIN forum ON kategori_forum.id = forum.id_kategori_forum)
                        LEFT JOIN role_forum on forum.id = role_forum.id_forum
                        and role_forum.id_mahasiswa= $sesionID
                        GROUP BY kategori_forum.nama_kategori
                        ORDER BY kategori_forum.id ASC;");
            $hslCt = $countCat->queryAll();
            $modelFor = Forum::find()->orderBy(['tanggal' => SORT_DESC])->all();
            if ($kat == NULL) {
                $modelDetFor = RoleMenu::find()->where(['id_mahasiswa' => $sesionID])->orderBy(['id' => SORT_DESC]);
            } else {
                $modelDetFor = RoleMenu::find()
                    ->select('role_forum.*')
                    ->leftJoin('forum', '`role_forum`.`id_forum` = `forum`.`id`')
                    ->where(['forum.id_kategori_forum' => $kat])
                    ->andWhere(['role_forum.id_mahasiswa' => $sesionID])
                    ->orderBy(['id' => SORT_DESC]);
            }

            $myAct = Forum::find()->where(['id_mahasiswa' => $sesionID])->orderBy(['id' => SORT_DESC])->limit(5)->all();
            //NodeLogger::sendLog($modelDetFor);
            $dataProvider = new ActiveDataProvider([
                'query' => $modelDetFor,
                'pagination' => [
                    'pageSize' => 5,
                ],
            ]);
        }
        return $this->render('index', [
            'modelCat' => $modelCat,
            'myAct' => $myAct,
            'modelFor' => $modelFor,
            'modelDetFor' => $modelDetFor,
            'dataProvider' => $dataProvider,
            'hslCt' => $hslCt
        ]);
    }

    public function actionCreate()
    {
        // print_r($_POST);
        $sessionID = Yii::$app->user->identity->getId();
        $model = new Forum();
        $roleM = new RoleMenu();
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->query->leftJoin('mhs_skill', 'mhs_skill.id_mahasiswa = mahasiswa.id');
        $dataProvider->query->leftJoin('mhs_minat', 'mhs_minat.id_mahasiswa = mahasiswa.id');
        $dataProvider->query->andFilterWhere(['not in','mahasiswa.id',Yii::$app->user->identity->getId()]);
        try {
            if (isset($_POST['cari'])) {
                $model->load($_POST);
//                print_r($_POST);
//                die();
                if (isset($_POST['fakultas']))
                    $dataProvider->query->andFilterWhere(["fakultas" => $_POST['fakultas']]);
                if (isset($_POST['jurusan']))
                    $dataProvider->query->andFilterWhere(["jurusan" => $_POST['jurusan']]);
                if (isset($_POST['thn_masuk']))
                    $dataProvider->query->andFilterWhere(["tahun_masuk" => $_POST['thn_masuk']]);
                if (isset($_POST['selected_minat']))
                    $dataProvider->query->andFilterWhere(["in","mhs_skill.skill_id", $_POST['selected_minat']]);
                if (isset($_POST['selected_minat2']))
                    $dataProvider->query->andFilterWhere(["in","mhs_minat.categori_id", $_POST['selected_minat2']]);
                if (isset($_POST['kota']))
                    $dataProvider->query->andFilterWhere(["kota" => $_POST['kota']]);
            } else if (isset($_POST['save'])) {
                $model->load($_POST);
                $model->tanggal = date("Y-m-d");
                $model->id_mahasiswa = Yii::$app->user->identity->getId();
                $model->status = 0;
                if ($model->save()) {
 //                       NodeLogger::sendLog($roleM);
                        if (isset($_POST['selection']) == NULL) {
                            $this->findModelEx($model->id)->delete();
                            return $this->redirect(Yii::$app->request->baseUrl . '/forum/create');
                        } else {
                            $c = implode(",", $_POST['selection']);
                        }
                        $pk = explode(",", $c);
                        foreach ($pk as $d => $value) {
                            $f = new RoleMenu();
                            $f->id_mahasiswa = $value;
                            $f->id_forum = $model->id;
                            $f->save();
                            $mh = Mahasiswa::find()->where(['id' => $f->id_mahasiswa])->one();
                            $ms = $mh->email;
                            $tex = 'Anda mendapat invite ke thread <a href="http://localhost/alumniits/forum/detail?id='.$model->id.'"> '.$model->judul.'</a> ';
                            Yii::$app->mailer->compose()
                                ->setTo($ms)
                                ->setFrom('ikaits.its@ac.id')
                                ->setSubject('Join To Thread'.$model->judul)
                                ->setHtmlBody($tex)
                                ->send();
                        }
                        $ad = new RoleMenu();
                        $ad->id_mahasiswa = Yii::$app->user->identity->getId();
                        $ad->id_forum = $model->id;
                        $ad->save();

                }
                return $this->redirect(Yii::$app->request->baseUrl . '/forum');

            }

        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $model,
            'roleM' => $roleM,
        ]);
    }

    public function actionDetail($id)
    {
        $connection = Yii::$app->db;
        $sesionID = Yii::$app->user->identity->getId();
        $model = Forum::find()->where(['id' => $id])->one();
        $countCat = $connection->createCommand("select kategori_forum.id, kategori_forum.nama_kategori,COUNT( forum.id ) total
                        FROM (kategori_forum
                        LEFT JOIN forum ON kategori_forum.id = forum.id_kategori_forum)
                        LEFT JOIN role_forum on forum.id = role_forum.id_forum
                        and role_forum.id_mahasiswa= $sesionID
                        GROUP BY kategori_forum.nama_kategori
                        ORDER BY kategori_forum.id ASC;");
        $hslCt = $countCat->queryAll();
        $mhs = \frontend\models\Mahasiswa::find()->where(['id' => $model->id_mahasiswa])->one();
        $myAct = Forum::find()->where(['id_mahasiswa' => $sesionID])->orderBy(['id' => SORT_DESC])->limit(5)->all();
        $komen = KomentarForum::find()->where(['id_forum' => $id])->orderBy(['tanggal' => SORT_DESC]);

        $models = new KomentarForum();
        if ($models->load($_POST)) {
            $models->id_forum = $id;
            $models->id_mahasiswa = $sesionID;
            $models->tanggal = date("Y-m-d");
            if ($models->save()) {
                return $this->redirect(Yii::$app->request->baseUrl . '/forum/detail?id=' . $id);
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $komen,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('detail', [
            'model' => $model,
            'hslCt' => $hslCt,
            'myAct' => $myAct,
            'mhs' => $mhs,
            'komen' => $komen,
            'dataProvider' => $dataProvider,
            'models' => $models

        ]);
    }
    public function actionListm($query)
    {
        $ganti = array("'");
        $ganti_baru = array("");
        $baru = str_replace($ganti, $ganti_baru ,$query);
        $queryS = "SELECT * FROM master_skill where nama LIKE '" . $baru . "%' ";
        $models = \frontend\models\MasterSkill::findBySql($queryS)->all();
        $items = [];
        foreach ($models as $model) {
            $items[] = [
                'id' => $model->id,
                'name' => $model->nama];
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $items;
    }
    public function actionListmnt($query)
    {
        $ganti = array("'");
        $ganti_baru = array("");
        $baru = str_replace($ganti, $ganti_baru ,$query);
        $queryS = "SELECT * FROM master_categori where nama LIKE '" . $baru . "%' ";
        $models = \frontend\models\MasterCategori::findBySql($queryS)->all();
        $items = [];
        foreach ($models as $model) {
            $items[] = [
                'id' => $model->id,
                'name' => $model->nama];
        }
// We know we can use ContentNegotiator filter
// this way is easier to show you here :)
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $items;
    }
    public function actionProses()
    {
        extract($_POST);
        $sessionID = Yii::$app->user->identity->getId();
        $options = Mahasiswa::find();

        if (isset($_POST['fakultas'])) {
            $fkl = $_POST['fakultas'];
            if (!empty($fkl)) {
                $options->andWhere(['like', 'fakultas', $fkl]);
            } else {
                $options;
            }
        }
        if (isset($_POST['jurusan'])) {
            $jrsn = $_POST['jurusan'];
            if (!empty($jrsn)) {
                $options->andWhere(['like', 'jurusan', $jrsn]);
            } else {
                $options;
            }
        }
        if (isset($_POST['thn_masuk'])) {
            $thn = $_POST['thn_masuk'];
            if (!empty($thn)) {
                $options->andWhere(['like', 'tahun_masuk', $thn]);
            } else {
                $options;
            }
        }
        $options->andWhere(['aprroved' => 2])->andWhere(['not in', 'id', [$sessionID]])->createCommand()->queryAll();
        $tes = $options->andWhere(['aprroved' => 2])->andWhere(['not in', 'id', [$sessionID]])->createCommand()->queryAll();
        //$optionj = ArrayHelper::map($options->andWhere(['aprroved' =>2])->andWhere(['not in', 'id', [$sessionID]])->createCommand()->queryAll(),'id','nama_lengkap');
        return json_encode($tes);

    }

    protected function findModelEx($id)
    {
        if (($model = Forum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}