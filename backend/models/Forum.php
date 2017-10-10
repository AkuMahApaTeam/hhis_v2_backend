<?php

namespace backend\models;

use Yii;
use \backend\models\base\Forum as BaseForum;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "forum".
 */
class Forum extends BaseForum
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
