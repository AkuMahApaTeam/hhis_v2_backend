<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Riwayat as BaseRiwayat;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "riwayat".
 */
class Riwayat extends BaseRiwayat
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
