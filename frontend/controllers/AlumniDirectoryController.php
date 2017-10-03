<?php
namespace frontend\controllers;

use frontend\models\DonasiEvent;
use dmstr\bootstrap\Tabs;
use frontend\components\NodeLogger;
use frontend\models\DonasiRutin;
use frontend\models\Mahasiswa;
use frontend\models\MahasiswaSearch;
use frontend\models\MhsMinat;
use frontend\models\MhsPekerjaan;
use frontend\models\MhsSkill;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\HttpException;

/**
 * Profile controller
 */
class AlumniDirectoryController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        //$data = Mahasiswa::find();
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search($_GET);
        $dataProvider->query->leftJoin('mhs_skill', 'mhs_skill.id_mahasiswa = mahasiswa.id');
        $dataProvider->query->leftJoin('mhs_minat', 'mhs_minat.id_mahasiswa = mahasiswa.id');
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

        $dataProvider->query->andFilterWhere(['aprroved' => 2])->all();
        $dataProvider->pagination->pageSize = 6;
        if (isset($_POST['fakultas']) != NULL) {
            $f = $_POST['fakultas'];
        } else {
            $f = "";
        }
        if (isset($_POST['jurusan']) != NULL) {
            $j = $_POST['jurusan'];
        } else {
            $j = "";
        }
        if (isset($_POST['thn_masuk']) != NULL) {
            $t = $_POST['thn_masuk'];
        } else {
            $t = "";
        }
        return $this->render('index', [
            'f' => $f,
            'j' => $j,
            't' => $t,
            //  'query' => $data,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionData()
    {
        $limit = 1;
        $i = $_POST['i'];
        $off = ($i - 1) * $limit;

        $array = Mahasiswa::find()
            ->select("nama_lengkap,lat,lng,foto")
            ->limit($limit)->offset($off)
            ->createCommand()
            ->queryAll();

        return (Json::encode($array));
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
// We know we can use ContentNegotiator filter
// this way is easier to show you here :)
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

    public function actionDetail($id)
    {
        $connection = \Yii::$app->db;
        $ganti = array("'");
        $ganti_baru = array("");
        $baru = str_replace($ganti, $ganti_baru, $id);
        $cek = $baru;
        $donasiJumlah = \frontend\models\Donasi::find()->where(['id_mahasiswa' => $cek]);
        $jumDonasi = $donasiJumlah->sum('jumlah');
        $totDonasi = $donasiJumlah->count('id');
        $donasiRutin = DonasiRutin::find()->where(['id_mahasiswa' => $cek]);
        $jumRutin = $donasiRutin->sum('jumlah');
        $totRutin = $donasiRutin->count('id');
        $donasiEvent = DonasiEvent::find()->where(['donatur' => $cek]);
        $jumEvent = $donasiEvent->sum('jumlah');
        $totEvent = $donasiEvent->count('id');
        $model = $this->findModel($cek);
        $randM = Mahasiswa::find()->orderBy('rand()')->where(['aprroved' => 2])->andWhere(['not in', 'id', [$cek]])->limit(3)->all();
        $totP = ($jumRutin + $jumEvent + $jumDonasi);
        $poin = floor($totP / 100000);
        $modelEx = MhsPekerjaan::find()->where(['mahasiswa_id' => $cek])->all();
        $modelIn = MhsMinat::find()->where(['id_mahasiswa' => $cek])->all();
        $modelSk = MhsSkill::find()->where(['id_mahasiswa' => $cek])->all();
        $trans = $connection->createCommand('(
                        select
                        m.id, m.nama_lengkap, r.id,r.jumlah, CONCAT("Donasi Rutin ", r.bulan, " ", r.tahun) as judul, tanggal
                        from mahasiswa m
                        left join donasi_rutin as r on m.id = r.id_mahasiswa where m.id = ' . $cek . '
                        )
                        union
                        (
                        select
                        m.id, m.nama_lengkap, d.id,d.jumlah, CONCAT("Donasi Onetime ", d.tgl_donasi) as judul, tgl_donasi as tanggal
                        from mahasiswa m
                        left join donasi as d on m.id = d.id_mahasiswa where m.id = ' . $cek . '
                        )
                        union
                        (
                        select
                        m.id, m.nama_lengkap, e.id,e.jumlah, CONCAT("Event : ", ev.judul) as judul, e.tanggal as tanggal_donasi
                        from mahasiswa m
                        left join donasi_event as e on m.id = e.donatur join event as ev on ev.id = e.event where m.id = ' . $cek . '
                        )

                        order by tanggal desc
                        limit 10');
        $tran = $trans->queryAll();
        return $this->render('detail', [
            'model' => $model,
            'jumDonasi' => $jumDonasi,
            'totDonasi' => $totDonasi,
            'jumRutin' => $jumRutin,
            'totRutin' => $totRutin,
            'jumEvent' => $jumEvent,
            'totEvent' => $totEvent,
            'poin' => $poin,
            'randM' => $randM,
            'modelEx' => $modelEx,
            'modelIn' => $modelIn,
            'tran' => $tran,
            'modelSk' => $modelSk
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
