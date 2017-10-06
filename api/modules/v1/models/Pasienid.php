<?php
namespace api\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Created by PhpStorm.
 * User: aal
 * Date: 6/19/17
 * Time: 11:45 PM
 */



class Pasienid extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id_pasien'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id_riwayat', 'id_pasien', 'id_dokter', 'umur','berat_badan','tinggi_badan','riwayat_kesehatan_keluarga','keluhan_utama','diagnosa','larangan','note','tgl_periksa','perawatan'], 'required']
        ];
    }
}
