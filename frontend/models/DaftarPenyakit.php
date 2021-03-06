<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\DaftarPenyakit as BaseDaftarPenyakit;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "daftar_penyakit".
 */
class DaftarPenyakit extends BaseDaftarPenyakit
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
