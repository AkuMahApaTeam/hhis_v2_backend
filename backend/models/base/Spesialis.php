<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "spesialis".
 *
 * @property string $spesialis
 * @property integer $id
 *
 * @property \app\models\NoIzinDokter[] $noIzinDokters
 * @property string $aliasModel
 */
abstract class Spesialis extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spesialis';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['spesialis'], 'required'],
            [['spesialis'], 'string', 'max' => 70]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'spesialis' => 'Spesialis',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoIzinDokters()
    {
        return $this->hasMany(\app\models\NoIzinDokter::className(), ['keahlian' => 'id']);
    }




}