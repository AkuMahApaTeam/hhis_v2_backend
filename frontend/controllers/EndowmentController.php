<?php
namespace frontend\controllers;

use frontend\models\DonasiRutin;
use frontend\components\NodeLogger;
use frontend\models\Donasi;
use frontend\models\DonasiEvent;
use frontend\models\Event;
use frontend\models\Mahasiswa;
use frontend\models\MasterDonasi;
use frontend\models\MasterMitraSearch;
use app\models\MasterKontrak;
use app\models\MasterKegiatan;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Profile controller
 */
class EndowmentController extends Controller
{
    public function actionIndex()
    {
        $model = Event::find()->orderBy(['id' => SORT_DESC]);
        $modelEnda = MasterDonasi::find()->orderBy(['id' => SORT_ASC])->one();
        $modelEndb = MasterDonasi::find()->limit(1)->orderBy(['id' => SORT_ASC])->offset('1')->one();
        $modelEndc = MasterDonasi::find()->limit(1)->orderBy(['id' => SORT_ASC])->offset('2')->one();
        $modelO = new Donasi();
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('index', [
            'model' => $model,
            'modelEnda' => $modelEnda,
            'modelEndb' => $modelEndb,
            'modelEndc' => $modelEndc,
            'modelO' => $modelO,
            'dataProvider'=> $dataProvider
        ]);
    }
    public function actionCorporate(){
        $searchModel = new MasterMitraSearch;
        $dataProvider = $searchModel->search($_GET);
        return $this->render('corporate', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
          

    }
   public function actionPersent($idKontrak){
        $jumlahKegiatan = 0;
        $jumlahNominal = 0;
        $queryKontrak = MasterKontrak::find()
            ->where([
                'id' => $idKontrak
            ])
            ->one();

        $nilaiKontrak = $queryKontrak->nilai_kontrak;

        $kegiatan = MasterKegiatan::find()
            ->where([
                'id_kontrak' => $idKontrak,
                'status' => 1,
                'flag' => 1
            ])
            ->all();

        foreach ($kegiatan as $key => $dataKegiatan) {
            $jumlahKegiatan++;
            $jumlahNominal += $dataKegiatan['nominal'];
        }
        $persent = ($jumlahNominal / $nilaiKontrak) * 100;
        return round($persent);
    }
    
    public function actionOthero()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            if (isset($_POST['one'])) {
                $tes = $_POST['Donasi'];
                $hsl = json_encode($tes);
                $hsl2 = json_decode($hsl, true);
                $jml = $hsl2['jumlah'];
                $id = Yii::$app->user->identity->id;
                $model = new Donasi();
                $modelEnda = MasterDonasi::find()->where(['id' => $jml])->one();
                $model->id_mahasiswa = $id;
                $model->jumlah = $modelEnda->nilai;
                $model->tgl_donasi = date('Y-m-d');
                if ($model->save()) {
                    return $this->redirect(['endowment/detailone/']);
                }
            } elseif (isset($_POST['monthly'])) {
                $tes = $_POST['Donasi'];
                $hsl = json_encode($tes);
                $hsl2 = json_decode($hsl, true);
                $jml = $hsl2['jumlah'];
                $id = Yii::$app->user->identity->id;
                $model = $this->findModel($id);
                $modelEnda = MasterDonasi::find()->where(['id' => $jml])->one();
                $model->donasi_rutin = '1';
                $model->jumlah_donasi = $modelEnda->nilai;
                if ($model->save()) {
                    return $this->redirect(['endowment/detailmonthly/']);
                }

            }
        };
    }

    public
    function actionDetailone()
    {
        $cek = Yii::$app->user->identity->id;
        $model = Donasi::find()->where(['id_mahasiswa' => $cek])->andWhere(['valid' => 1])->orderBy(['id' => SORT_DESC])->one();
        $donasiJumlah = \frontend\models\Donasi::find()->where(['id_mahasiswa' => $cek]);
        $jumDonasi = $donasiJumlah->sum('jumlah');
        $donasiRutin = DonasiRutin::find()->where(['id_mahasiswa' => $cek]);
        $jumRutin = $donasiRutin->sum('jumlah');
        $donasiEvent = DonasiEvent::find()->where(['donatur' => $cek]);
        $jumEvent = $donasiEvent->sum('jumlah');
        $totP = ($jumRutin + $jumEvent + $jumDonasi);
        $poin = floor($totP / 100000);
        return $this->render('detailone', [
            'model' => $model,
            'poin' => $poin
        ]);
    }

    public
    function actionDetailmonthly()
    {
        $cek = Yii::$app->user->identity->id;
        $model = Mahasiswa::find()->where(['id' => $cek])->one();
        $donasiJumlah = \frontend\models\Donasi::find()->where(['id_mahasiswa' => $cek]);
        $jumDonasi = $donasiJumlah->sum('jumlah');
        $donasiRutin = DonasiRutin::find()->where(['id_mahasiswa' => $cek]);
        $jumRutin = $donasiRutin->sum('jumlah');
        $donasiEvent = DonasiEvent::find()->where(['donatur' => $cek]);
        $jumEvent = $donasiEvent->sum('jumlah');
        $totP = ($jumRutin + $jumEvent + $jumDonasi);
        $poin = floor($totP / 100000);
        return $this->render('detailmonthly', [
            'model' => $model,
            'poin' => $poin
        ]);
    }

    public
    function actionDetailevent()
    {
        $cek = Yii::$app->user->identity->id;
        $model = DonasiEvent::find()->where(['donatur' => $cek])->andWhere(['valid' => 0])->orderBy(['id' => SORT_DESC])->one();
        $donasiJumlah = \frontend\models\Donasi::find()->where(['id_mahasiswa' => $cek]);
        $jumDonasi = $donasiJumlah->sum('jumlah');
        $donasiRutin = DonasiRutin::find()->where(['id_mahasiswa' => $cek]);
        $jumRutin = $donasiRutin->sum('jumlah');
        $donasiEvent = DonasiEvent::find()->where(['donatur' => $cek]);
        $jumEvent = $donasiEvent->sum('jumlah');
        $totP = ($jumRutin + $jumEvent + $jumDonasi);
        $poin = floor($totP / 100000);
        return $this->render('detailevent', [
            'model' => $model,
            'poin' => $poin
        ]);
    }

    public
    function actionBulana()
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

    public
    function actionBulanb()
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

    public
    function actionBulanc()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = $this->findModel($id);
            $model->donasi_rutin = '1';
            $model->jumlah_donasi = '20000';
            NodeLogger::sendLog($model->nama_lengkap);
            if ($model->save()) {
                return $this->redirect(['endowment/detailmonthly/']);
            }
        }
    }

    public
    function actionBuland()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = $this->findModel($id);
            $model->donasi_rutin = '1';
            $model->jumlah_donasi = '50000';
            NodeLogger::sendLog($model->nama_lengkap);
            if ($model->save()) {
                return $this->redirect(['endowment/detailmonthly/']);
            }
        }
    }

    public
    function actionOnea()
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
            $ceks = Donasi::find()->where(['tgl_donasi' => $model->tgl_donasi]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailone/']);
            }
        }
    }

    public
    function actionOneb()
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
            $ceks = Donasi::find()->where(['tgl_donasi' => $model->tgl_donasi]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment?msg=gagal');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailone/']);
            }
        }

    }
    public
    function actionOnec()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = new Donasi();
            $model->id_mahasiswa = $id;
            $model->jumlah = '20000';
            $model->tgl_donasi = date('Y-m-d');
            $ceks = Donasi::find()->where(['tgl_donasi' => $model->tgl_donasi]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailone/']);
            }
        }

    }

    public
    function actionOned()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $id = Yii::$app->user->identity->id;
            $model = new Donasi();
            $model->id_mahasiswa = $id;
            $model->jumlah = '50000';
            $model->tgl_donasi = date('Y-m-d');
            $ceks = Donasi::find()->where(['tgl_donasi' => $model->tgl_donasi]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailone/']);
            }
        }

    }

    public
    function actionEventa($id)
    {
        $cek = Yii::$app->user->identity->id;
        $modelE = $this->findEvent($id);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $model = new DonasiEvent();
            $model->event = $modelE->id;
            $model->donatur = $cek;
            $model->jumlah = '5000';
            $model->tanggal = date('Y-m-d');
            $model->valid = '0';
            $ceks = DonasiEvent::find()->where(['tanggal' => $model->tanggal]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailevent/']);
            }

        }
    }

    public
    function actionEventb($id)
    {
        $cek = Yii::$app->user->identity->id;
        $modelE = $this->findEvent($id);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $model = new DonasiEvent();
            $model->event = $modelE->id;
            $model->donatur = $cek;
            $model->jumlah = '10000';
            $model->tanggal = date('Y-m-d');
            $model->valid = '0';
            $ceks = DonasiEvent::find()->where(['tanggal' => $model->tanggal]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailevent/']);
            }
        }

    }

    public
    function actionEventc($id)
    {
        $cek = Yii::$app->user->identity->id;
        $modelE = $this->findEvent($id);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $model = new DonasiEvent();
            $model->event = $modelE->id;
            $model->donatur = $cek;
            $model->jumlah = '20000';
            $model->tanggal = date('Y-m-d');
            $model->valid = '0';
            $ceks = DonasiEvent::find()->where(['tanggal' => $model->tanggal]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailevent/']);
            }
        }

    }

    public
    function actionEventd($id)
    {
        $cek = Yii::$app->user->identity->id;
        $modelE = $this->findEvent($id);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $model = new DonasiEvent();
            $model->event = $modelE->id;
            $model->donatur = $cek;
            $model->jumlah = '50000';
            $model->tanggal = date('Y-m-d');
            $model->valid = '0';
            $ceks = DonasiEvent::find()->where(['tanggal' => $model->tanggal]);
            $ht = $ceks->count('id');
            if ($ht >= 2) {
                return $this->redirect(Yii::$app->request->baseUrl . '/endowment');
            } else {
                $model->save();
                return $this->redirect(['endowment/detailevent/']);
            }
        }

    }

    protected
    function findModel()
    {
        $id = Yii::$app->user->identity->id;
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    protected
    function findEvent($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
