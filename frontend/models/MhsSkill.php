<?php

namespace frontend\models;

use dosamigos\taggable\Taggable;
use Yii;
use \frontend\models\base\MhsSkill as BaseMhsSkill;

/**
 * This is the model class for table "mhs_skill".
 */
class MhsSkill extends BaseMhsSkill
{
    public function behaviors() {
        return [
            [
                'class' => Taggable::className(),
            ],
        ];
    }
}
