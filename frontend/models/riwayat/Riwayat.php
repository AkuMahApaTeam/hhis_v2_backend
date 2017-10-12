<?php

namespace frontend\models\riwayat;

use Yii;
use frontend\models\pasien\Pasien;
use frontend\models\dokter\Dokter;

/**
 * This is the model class for table "riwayat".
 *
 * @property integer $id_riwayat
 * @property integer $id_pasien
 * @property integer $id_dokter
 * @property integer $umur
 * @property integer $berat_badan
 * @property integer $tinggi_badan
 * @property string $riwayat_kesehatan_keluarga
 * @property string $keluhan_utama
 * @property string $diagnosa
 * @property string $larangan
 * @property string $note
 * @property string $tgl_periksa
 * @property string $perawatan
 *
 * @property Pasien $idPasien
 * @property Dokter $idDokter
 */
class Riwayat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat';
    }

    public function fields()
    {
        return ['id_dokter','dokter',
            'id_riwayat',
            'berat_badan',
            'tinggi_badan',
            'riwayat_kesehatan_keluarga',
            'keluhan_utama',
            'diagnosa' ,
            'larangan' ,
            'note' ,
            'tgl_periksa',
            'perawatan',
            'umur'            
           ];
    }

//    public function extraFields()
//    {
//        return ['perawatan'];
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_dokter', 'perawatan'], 'required'],
            [['id_pasien', 'id_dokter', 'umur', 'berat_badan', 'tinggi_badan'], 'integer'],
            [['riwayat_kesehatan_keluarga', 'keluhan_utama', 'diagnosa', 'larangan', 'note'], 'string'],
            [['tgl_periksa'], 'safe'],
            [['perawatan'], 'string', 'max' => 25],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_dokter'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['id_dokter' => 'id_dokter']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_riwayat' => 'Id Riwayat',
            'id_pasien' => 'Id Pasien',
            'id_dokter' => 'Id Dokter',
            'umur' => 'Umur',
            'berat_badan' => 'Berat Badan',
            'tinggi_badan' => 'Tinggi Badan',
            'riwayat_kesehatan_keluarga' => 'Riwayat Kesehatan Keluarga',
            'keluhan_utama' => 'Keluhan Utama',
            'diagnosa' => 'Diagnosa',
            'larangan' => 'Larangan',
            'note' => 'Note',
            'tgl_periksa' => 'Tgl Periksa',
            'perawatan' => 'Perawatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPasien()
    {
        return $this->hasOne(Pasien::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getDokter()
    {
        return $this->hasOne(Dokter::className(), ['id_dokter' => 'id_dokter']);
    }
//
//    public function getDokter()
//    {
//        return $this->hasOne(Dokter::className(), ['nama_dokter' => 'nama_dokter']);
//    }
}
