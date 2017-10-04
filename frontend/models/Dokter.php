<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Dokter as BaseDokter;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dokter".
 */
class Dokter extends BaseDokter
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
