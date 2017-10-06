<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\models\base;

use Yii;

/**
 * This is the base-model class for table "dokter".
 *
 * @property integer $id_dokter
 * @property integer $id_no_izin
 * @property string $email
 * @property string $alamat_rumah
 * @property string $alamat_praktik
 * @property string $nama_dokter
 * @property string $no_telp
 * @property string $password
 * @property integer $id_kota
 * @property integer $id_provinsi
 * @property integer $id_user
 *
 * @property \frontend\models\NoIzinDokter $idNoIzin
 * @property \frontend\models\Riwayat[] $riwayats
 * @property string $aliasModel
 */
abstract class Dokter extends \yii\db\ActiveRecord
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
            [['id_no_izin', 'password', 'id_kota', 'id_provinsi', 'id_user'], 'required'],
            [['id_no_izin', 'id_kota', 'id_provinsi', 'id_user'], 'integer'],
            [['email'], 'string', 'max' => 50],
            [['alamat_rumah', 'alamat_praktik', 'nama_dokter', 'password'], 'string', 'max' => 255],
            [['no_telp'], 'string', 'max' => 15],
            [['id_no_izin'], 'exist', 'skipOnError' => true, 'targetClass' => \frontend\models\IzinDokter::className(), 'targetAttribute' => ['id_no_izin' => 'id_no_izin']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dokter' => 'Id Dokter',
            'id_no_izin' => 'Id No Izin',
            'email' => 'Email',
            'alamat_rumah' => 'Alamat Rumah',
            'alamat_praktik' => 'Alamat Praktik',
            'nama_dokter' => 'Nama Dokter',
            'no_telp' => 'No Telp',
            'password' => 'Password',
            'id_kota' => 'Id Kota',
            'id_provinsi' => 'Id Provinsi',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNoIzin()
    {
        return $this->hasOne(\frontend\models\IzinDokter::className(), ['id_no_izin' => 'id_no_izin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayats()
    {
        return $this->hasMany(\frontend\models\Riwayat::className(), ['id_dokter' => 'id_dokter']);
    }




}