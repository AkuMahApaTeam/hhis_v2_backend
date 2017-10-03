<?php

namespace app\models;

use Yii;
use \app\models\base\Jenis as BaseJenis;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "jenis".
 */
class Jenis extends BaseJenis
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
