<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

//use backend\models\Loker;
use frontend\models\MasterSkill;
use Yii;

/**
 * This is the base-model class for table "loker_skill".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $loker_id
 *
 * @property \app\models\Loker $loker
 * @property \app\models\MasterSkill $category
 * @property string $aliasModel
 */
abstract class LokerSkill extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loker_skill';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'loker_id'], 'required'],
            [['category_id', 'loker_id'], 'integer'],
            [['loker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loker::className(), 'targetAttribute' => ['loker_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterSkill::className(), 'targetAttribute' => ['category_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'loker_id' => 'Loker ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoker()
    {
        return $this->hasOne(Loker::className(), ['id' => 'loker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(MasterSkill::className(), ['id' => 'category_id']);
    }




}
