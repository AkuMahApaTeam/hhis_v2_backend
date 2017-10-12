<?php
namespace api\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Created by PhpStorm.
 * User: aal
 * Date: 6/19/17
 * Time: 11:45 PM
 */



class Izin extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'no_izin_dokter';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id_no_izin'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['id_no_izin', 'no_izin','keahlian'], 'required']
        ];
    }
}
