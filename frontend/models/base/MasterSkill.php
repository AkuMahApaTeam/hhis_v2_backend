<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\models\base;

use Yii;

/**
 * This is the base-model class for table "master_skill".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $valid
 *
 * @property \frontend\models\MhsSkill[] $mhsSkills
 * @property string $aliasModel
 */
abstract class MasterSkill extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_skill';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['valid'], 'integer'],
            [['nama'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'valid' => 'Valid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMhsSkills()
    {
        return $this->hasMany(\frontend\models\MhsSkill::className(), ['skill_id' => 'id']);
    }




}
