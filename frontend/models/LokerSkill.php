<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\LokerSkill as BaseLokerSkill;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "loker_skill".
 */
class LokerSkill extends BaseLokerSkill
{

public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
             parent::rules(),
             [
                  # custom validation rules
             ]
        );
    }
}
