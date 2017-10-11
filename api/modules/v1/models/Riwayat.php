<?php
namespace api\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Created by PhpStorm.
 * User: aal
 * Date: 6/19/17
 * Time: 11:45 PM
 */



class Riwayat extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id_pasien'];
    }

//    public function fields()
//    {
//        return [
//            'id_riwayat',
//            'id_dokter',
//            'dokter' => function ($model) {
//                return $model->id_dokter; // Return related model property, correct according to your structure
//            },
//        ];
//    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id_pasien', 'nama_pasien'], 'required']
        ];
    }

//    public function getDokter()
//    {
//        return $this->hasOne(Dokter::className(), ['id' => 'id_dokter']);
//    }
//
//    public function getPasien()
//    {
//        return $this->hasMany(Riwayat::className(), ['id' => 'id_pasien'])->viaTable('pasien', ['nama_pasien' => 'nama_pasien']);
//    }
//
//    public function getTest()
//    {
//        return (new \yii\db\Query())
//            ->select('nama_dokter')
//            ->from('dokter')
//            ->where([ 'id_dokter' => $this->id_dokter ])
//            ->scalar();
//    }
//

    public function fields()
    {
        return ['id_riwayat', 'id_dokter'];
    }

    public function extraFields()
    {
        return ['dokter'];
    }

}
