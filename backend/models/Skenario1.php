<?php

namespace app\models;

use Yii;
use \app\models\base\Skenario1 as BaseSkenario1;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "skenario1".
 */
class Skenario1 extends BaseSkenario1
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
