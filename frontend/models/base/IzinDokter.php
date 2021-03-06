<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\models\base;

use Yii;

/**
 * This is the base-model class for table "no_izin_dokter".
 *
 * @property integer $id_no_izin
 * @property string $no_izin
 * @property integer $keahlian
 *
 * @property \frontend\models\Dokter[] $dokters
 * @property \frontend\models\Spesialis $keahlian0
 * @property string $aliasModel
 */
abstract class IzinDokter extends \yii\db\ActiveRecord
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
    public function rules()
    {
        return [
            [['no_izin', 'keahlian'], 'required'],
            [['keahlian'], 'integer'],
            [['no_izin'], 'string', 'max' => 25],
            [['no_izin'], 'unique'],
            [['keahlian'], 'exist', 'skipOnError' => true, 'targetClass' => \frontend\models\Spesialis::className(), 'targetAttribute' => ['keahlian' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_no_izin' => 'Id No Izin',
            'no_izin' => 'No Izin',
            'keahlian' => 'Keahlian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokters()
    {
        return $this->hasMany(\frontend\models\Dokter::className(), ['id_no_izin' => 'id_no_izin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlian0()
    {
        return $this->hasOne(\frontend\models\Spesialis::className(), ['id' => 'keahlian']);
    }
      



}
