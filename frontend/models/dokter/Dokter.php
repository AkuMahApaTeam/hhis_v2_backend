<?php

namespace frontend\models\dokter;
use common\models\noIzinDokter\NoIzinDokter;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property integer $id_dokter
 * @property integer $id_no_izin
 * @property string $email
 * @property string $alamat_rumah
 * @property string $alamat_praktik
 * @property string $nama_dokter
 * @property string $no_telp
 * @property string $password
 *
 * @property ArtikelDokter[] $artikelDokters
 * @property NoIzinDokter $idNoIzin
 * @property Riwayat[] $riwayats
 * @property User $user
 */
class Dokter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_no_izin', 'password','email','alamat_rumah','alamat_praktik','nama_dokter','no_telp'], 'required','message'=>'semua field harus terisi'],
            ['nama_dokter','unique','message'=>'username sudah ada, silahkan menggunakan username lain'],
            ['id_no_izin','unique','message'=>'SIP sudah digunakan, anda tidak bisa mendaftar'],
            [['email'], 'string', 'max' => 50],
            [['alamat_rumah', 'alamat_praktik', 'nama_dokter', 'password'], 'string', 'max' => 255],
            [['no_telp'], 'string', 'max' => 15],
            [['id_no_izin'], 'exist', 'skipOnError' => true, 'targetClass' => NoIzinDokter::className(), 'targetAttribute' => ['id_no_izin' => 'id_no_izin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dokter' => 'Id Dokter',
            'id_no_izin' => 'SIP',
            'email' => 'Email',
            'alamat_rumah' => 'Alamat Rumah',
            'alamat_praktik' => 'Alamat Praktik',
            'nama_dokter' => 'Nama Dokter',
            'no_telp' => 'No Telp',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikelDokters()
    {
        return $this->hasMany(ArtikelDokter::className(), ['id_dokter' => 'id_dokter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNoIzin()
    {
        return $this->hasOne(NoIzinDokter::className(), ['id_no_izin' => 'id_no_izin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayats()
    {
        return $this->hasMany(Riwayat::className(), ['id_dokter' => 'id_dokter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_dokter' => 'id_dokter']);
    }
}
