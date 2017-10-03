<?php

namespace app\models;

use Yii;
use \app\models\base\Spesialis as BaseSpesialis;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "spesialis".
 */
class Spesialis extends BaseSpesialis
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
