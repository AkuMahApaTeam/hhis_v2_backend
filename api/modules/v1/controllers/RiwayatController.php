<?php
/**
 * Created by PhpStorm.
 * User: aal
 * Date: 7/16/17
 * Time: 2:24 PM
 */
namespace api\modules\v1\controllers;
use Yii;
use yii\helpers\ArrayHelper;

class RiwayatController extends \yii\rest\Controller
{
    protected function verbs()
    {
        return [
            'insert' => ['POST'],
        ];
    }
//    public function actionInsert(){
//        $exec = Yii::$app->db->createCommand()
//            ->insert('guestbook', [
//                'name' => $_POST['name'],
//                'message' => $_POST['message'],
//            ])->execute();
//        $msg = ($exec)?"SUKSES":"ERROR KAKA";
//        return ['data'=>$msg];
//    }
    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }
    public function actionView($nik){


        $pasien = \frontend\models\pasien\Pasien::find()->where(['nik' => $nik])->one();
        $id_pasien = \frontend\models\pasien\Pasien::find()
            ->select('id_pasien')
            ->where(['nik' => $nik])
            ->one();
        $riwayat = \frontend\models\riwayat\Riwayat::find()->where(['id_pasien' => $id_pasien])->all();
        $id_dokter = \frontend\models\riwayat\Riwayat::find()
            ->select('id_dokter')
            ->where(['id_pasien' => $id_pasien])
            ->one();
        $dokter = \frontend\models\dokter\Dokter::find()->where(['id_dokter' => $id_dokter])->one();

//        return [$pasien,[\frontend\models\dokter\Dokter::find()->select('nama_dokter')
//            ->where(['id_dokter' => $id_dokter])
//            ->one()],$riwayat];
        return ["id_pasien"=>$pasien->id_pasien,
                "nama_pasien"=>$pasien->nama_pasien,
                "alamat"=>$pasien->alamat,
                "no_telp_pasien"=>$pasien->no_telp_pasien,
                "gol_darah"=>$pasien->gol_darah,
                "jenis_kelamin"=>$pasien->jenis_kelamin,
                "nik"=>$pasien->nik,
                "riwayat"=>$riwayat];
    }
}