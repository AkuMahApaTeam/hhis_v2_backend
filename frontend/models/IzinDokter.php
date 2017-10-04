<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\IzinDokter as BaseIzinDokter;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "no_izin_dokter".
 */
class IzinDokter extends BaseIzinDokter
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
