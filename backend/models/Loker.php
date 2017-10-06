<?php

namespace backend\models;

use Yii;
use \app\models\base\Loker as BaseLoker;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "loker".
 */
class Loker extends BaseLoker
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
