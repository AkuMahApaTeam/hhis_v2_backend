<?php
namespace frontend\controllers;

use frontend\models\LokerSearch;
use app\models\MahasiswaSearch;
use frontend\components\NodeLogger;
use frontend\models\Loker;
use frontend\models\LokerSkill;
use frontend\models\LokerSkillSearch;
use frontend\models\Mahasiswa;
use frontend\models\MhsSkill;
use frontend\models\MhsSkillSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\HttpException;

/**
 * Profile controller
 */
class VacanciesController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {

        $skill = new LokerSearch();
        $dataProvider = $skill->search($_GET);
        if (isset($_POST['cari'])) {
            if(isset($_POST['selected_skill']))
            $dataProvider->query->leftJoin('loker_skill', 'loker.id = loker_skill.loker_id');
            $dataProvider->query->andFilterWhere(["in", "loker_skill.category_id", $_POST['selected_skill']]);
            $dataProvider->query->andFilterWhere(['flag' => 0])->all();
            $dataProvider->pagination->pageSize = 5;

        } else {
            $dataProvider->query->andFilterWhere(['flag' => 0])->all();
            $dataProvider->pagination->pageSize = 5;
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(Yii::$app->request->baseUrl . '/site/login');
        } else {
            $sessionID = Yii::$app->user->identity->getId();
            $model = new Loker();
            $searchModel = new \frontend\models\MahasiswaSearch();
            $dataProvider = $searchModel->search($_GET);
            $dataProvider->query->leftJoin('mhs_skill', 'mhs_skill.id_mahasiswa = mahasiswa.id');
            $dataProvider->query->leftJoin('mhs_minat', 'mhs_minat.id_mahasiswa = mahasiswa.id');
            $dataProvider->query->andFilterWhere(['not in', 'mahasiswa.id', Yii::$app->user->identity->getId()]);
            try {
                if (isset($_POST['cari'])) {
                    $model->load($_POST);
                    if (isset($_POST['fakultas']))
                        $dataProvider->query->andFilterWhere(["fakultas" => $_POST['fakultas']]);
                    if (isset($_POST['jurusan']))
                        $dataProvider->query->andFilterWhere(["jurusan" => $_POST['jurusan']]);
                    if (isset($_POST['thn_masuk']))
                        $dataProvider->query->andFilterWhere(["tahun_masuk" => $_POST['thn_masuk']]);
                    if (isset($_POST['selected_minat']))
                        $dataProvider->query->andFilterWhere(["in", "mhs_skill.skill_id", $_POST['selected_minat']]);
                    if (isset($_POST['selected_minat2']))
                        $dataProvider->query->andFilterWhere(["in", "mhs_minat.categori_id", $_POST['selected_minat2']]);
                } else if (isset($_POST['save'])) {
                    $model->load($_POST);
                    $model->tanggal = date("Y-m-d");
                    $model->id_mahasiswa = Yii::$app->user->identity->getId();
                    $model->flag = 0;
                    $model->save();

                    /*                print_r($model->load($_POST['save']));
                                    die();*/
                    if ($model->save() == TRUE) {
                        //                       NodeLogger::sendLog($roleM);
                        if (isset($_POST['selection']) == NULL) {
                            $this->findModelEx($model->id)->delete();
                            return $this->redirect(Yii::$app->request->baseUrl . '/vacancies/create');
                        } else {
                            $c = implode(",", $_POST['selection']);
                            if (isset($_POST['selected_skill'])) {
                                foreach (explode(',', $_POST['selected_skill']) as $id) {
                                    if (ctype_digit($id)) {
                                        NodeLogger::sendLog($model->id);
//echo "YES - ";
                                        $modelSkk = new LokerSkill();
                                        $modelSkk->category_id = $id;
                                        $modelSkk->loker_id = $model->id;
                                        $modelSkk->save();

                                    } else {
//echo "NO - ";
                                        $masterSkill = new \frontend\models\MasterSkill();
                                        $masterSkill->nama = $id;
                                        $masterSkill->valid = 0;
                                        $masterSkill->save();

                                        $modelSkk = new LokerSkill();
                                        $modelSkk->category_id = $masterSkill->id;
                                        $modelSkk->loker_id = $model->id;
                                        $modelSkk->save();
                                        $modelSkk->save();
                                    }
                                }
                            }
                        }
                        $pk = explode(",", $c);
                        foreach ($pk as $d => $value) {
                            $mh = Mahasiswa::find()->where(['id' => $value])->one();
                            $ms = $mh->email;
                            $tex = 'Terdapat Job baru <a href="http://localhost/alumniits/vacancies/detail?id=' . $model->id . '"> ' . ' ' . $model->judul . '</a> ';
                            Yii::$app->mailer->compose()
                                ->setTo($ms)
                                ->setFrom('ikaits.its@ac.id')
                                ->setSubject('Join To Thread' . $model->judul)
                                ->setHtmlBody($tex)
                                ->send();
                        }
                    }
                    return $this->redirect(Yii::$app->request->baseUrl . '/vacancies');

                }

            } catch (\Exception $e) {
                $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
                $model->addError('_exception', $msg);
            }
            return $this->render('create', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'model' => $model,
            ]);
        }
    }

    public function actionListm($query)
    {
        $ganti = array("'");
        $ganti_baru = array("");
        $baru = str_replace($ganti, $ganti_baru, $query);
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
        $baru = str_replace($ganti, $ganti_baru, $query);
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

    public function actionList($query)
    {
        $ganti = array("'");
        $ganti_baru = array("");
        $baru = str_replace($ganti, $ganti_baru, $query);
        $queryS = "SELECT * FROM master_skill where nama LIKE '" . $baru . "%' ";
        $models = \frontend\models\MasterSkill::findBySql($queryS)->all();
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

    public function actionDetail($id)
    {
        if ($id != NULL) {
            $dataLok = Loker::find()->where(['id' => $id])->one();
            $dataRecruit = Mahasiswa::find()->where(['id' => $dataLok->id_mahasiswa])->one();
            //$dataSug = new LokerSkill();
            $searchModel = new LokerSkillSearch();
            $dataProvider = $searchModel->search($_GET);
            $dataProvider->query->leftJoin('mhs_skill', 'loker_skill.category_id = mhs_skill.skill_id');
            if (Yii::$app->user->isGuest) {

            } else {
                $dataProvider->query->andFilterWhere(['not in', 'mhs_skill.id_mahasiswa', Yii::$app->user->identity->getId()]);

            }
            $dataProvider->query->groupBy('mhs_skill.id_mahasiswa');
            $dataProvider->pagination->pageSize = 5;
        } else {
            return $this->redirect(Yii::$app->request->baseUrl . '/vacancies');
        }
        return $this->render('detail', [
            'dataLok' => $dataLok,
            'dataRecruit' => $dataRecruit,
            'dataProvider' => $dataProvider
        ]);
    }

    protected function findModelEx($id)
    {
        if (($model = Loker::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
