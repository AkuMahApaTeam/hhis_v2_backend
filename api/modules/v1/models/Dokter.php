<?php
namespace api\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Created by PhpStorm.
 * User: aal
 * Date: 6/19/17
 * Time: 11:45 PM
 */



class Dokter extends ActiveRecord
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
    public static function primaryKey()
    {
        return ['id_dokter'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id_dokter', 'id_no_izin', 'email', 'alamat_rumah','alamat_praktik','nama_dokter','no_telp'], 'required']
        ];
    }
}
