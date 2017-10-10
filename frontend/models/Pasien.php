<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\Pasien as BasePasien;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pasien".
 */
class Pasien extends BasePasien
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
