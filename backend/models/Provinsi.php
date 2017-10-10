<?php

namespace app\models;

use Yii;
use \app\models\base\Provinsi as BaseProvinsi;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "provinsi".
 */
class Provinsi extends BaseProvinsi
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
