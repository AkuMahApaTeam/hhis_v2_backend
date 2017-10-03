<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\models\base;

use Yii;

/**
 * This is the base-model class for table "master_donasi".
 *
 * @property integer $id
 * @property integer $nilai
 * @property string $aliasModel
 */
abstract class MasterDonasi extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_donasi';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah'], 'safe'],
            [['nilai'], 'required'],
            [['nilai'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nilai' => 'Nilai',
        ];
    }




}