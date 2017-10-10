<?php
namespace frontend\controllers;

use frontend\models\MasterPerusahaan;
use frontend\models\MhsMinat;
use dosamigos\taggable\Taggable;
use frontend\models\MhsSkill;
use PhpCsFixer\DocBlock\Tag;
use yii\base\Response;
use yii\db\Query;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use frontend\components\NodeLogger;
use frontend\models\base\DonasiEvent;
use frontend\models\Donasi;
use frontend\models\DonasiRutin;
use frontend\models\Mahasiswa;
use frontend\models\MhsPekerjaan;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * Profile controller
 */
class ProfileController extends Controller
{
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            $connection = \Yii::$app->db;
            $cek = Yii::$app->user->identity->getId();
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
            return $this->render('index', [
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
    }

    function actionUpdate()
    {
        $cek = Yii::$app->user->identity->getId();
        $model = $this->findModel($cek);
        $oldFoto = $model->foto;
        $oldPass = $model->password_hash;
        $model->password_hash = "";
        if ($model->load($_POST)) {
            if ($model->password_hash != "") {
                $model->password_hash = password_hash($model->password_hash, PASSWORD_DEFAULT);
            } else {
                $model->password_hash = $oldPass;
            }
            $img = UploadedFile::getInstance($model, 'foto');
            if ($img != NULL) {
                $model->foto = $img->name;
                $arr = explode(".", $img->name);
                $extension = end($arr);
                $model->foto = Yii::$app->security->generateRandomString() . ".{$extension}";
                $path = Yii::getAlias("@frontend/web/uploads/mhs/") . $model->foto;
                $img->saveAs($path);
            } else {
                $model->foto = $oldFoto;
            }

            if ($model->save()) {
                Yii::$app->session->addFlash("success", "Profile successfully updated.");

            } else {
                Yii::$app->session->addFlash("danger", "Profile cannot updated.");
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/profile');
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionExperience()
    {

        $model = new MhsPekerjaan;

        try {
            if ($model->load($_POST)) {
                $model->mahasiswa_id = Yii::$app->user->identity->id;
                $modelP = MasterPerusahaan::find()->where(['id' => $model->perusahaan_id])->one();
                $model->nama_perusahaan = $modelP->nama;
                if($model->tanggal_akhir == NULL){
                    $model->status = "";
                }else{
                    $model->status = "1";
                }

                if ($model->save()) {
                    return $this->redirect(Yii::$app->request->baseUrl . '/profile');
                } elseif (!\Yii::$app->request->isPost) {
                    $model->load($_GET);
                }
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
            NodeLogger::sendLog($model->save());
        }
        return $this->renderAjax('create', ['model' => $model]);
    }

    public function actionInterest()
    {

        if (isset($_POST['selected_minat'])) {
            foreach (explode(',', $_POST['selected_minat']) as $id) {
                if (ctype_digit($id)) {
//echo "YES - ";
                    $model = new MhsMinat();
                    $model->categori_id = $id;
                    $model->id_mahasiswa = Yii::$app->user->identity->id;
                    $model->save();

                } else {
//echo "NO - ";
                    $masterMinat = new \frontend\models\MasterCategori();
                    $masterMinat->nama = $id;
                    $masterMinat->valid = 0;
                    $masterMinat->save();

                    $model = new MhsMinat();
                    $model->categori_id = $masterMinat->id;
                    $model->id_mahasiswa = Yii::$app->user->identity->id;
                    $model->save();
                    $model->save();
                }
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/profile');
        }

        return $this->renderAjax('createIn');
    }

    public function actionSkill()
    {

        if (isset($_POST['selected_skill'])) {
            foreach (explode(',', $_POST['selected_skill']) as $id) {
                if (ctype_digit($id)) {
//echo "YES - ";
                    $model = new MhsSkill();
                    $model->skill_id = $id;
                    $model->id_mahasiswa = Yii::$app->user->identity->id;
                    $model->save();

                } else {
//echo "NO - ";
                    $masterSkill = new \frontend\models\MasterSkill();
                    $masterSkill->nama = $id;
                    $masterSkill->valid = 0;
                    $masterSkill->save();

                    $model = new MhsSkill();
                    $model->skill_id = $masterSkill->id;
                    $model->id_mahasiswa = Yii::$app->user->identity->id;
                    $model->save();
                    $model->save();
                }
            }
            return $this->redirect(Yii::$app->request->baseUrl . '/profile');
        }

        return $this->renderAjax('createSk');
    }

    public function actionDeleteEx($id)
    {
        try {
            $this->findModelEx($id)->delete();
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
            return $this->redirect(Yii::$app->request->baseUrl . '/profile');
        }
    }

    public function actionDeleteIn($id)
    {
        try {
            $this->findModelIn($id)->delete();
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
            return $this->redirect(Yii::$app->request->baseUrl . '/profile');
        }
    }

    public function actionDeleteSk($id)
    {
        try {
            $this->findModelSk($id)->delete();
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
            return $this->redirect(Yii::$app->request->baseUrl . '/profile');
        }
    }

    public function actionList($query)
    {
        $queryS = "SELECT * FROM master_skill where nama LIKE '" . $query . "%' ";
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

    public function actionListm($query)
    {
        $queryS = "SELECT * FROM master_categori where nama LIKE '" . $query . "%' ";
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

    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    protected function findModelIn($id)
    {
        if (($model = MhsMinat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    protected function findModelEx($id)
    {
        if (($model = MhsPekerjaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

    protected function findModelSk($id)
    {
        if (($model = MhsSkill::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
