<?php

namespace app\models;

use Yii;
use \app\models\base\JenisKegiatan as BaseJenisKegiatan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "jenis_kegiatan".
 */
class JenisKegiatan extends BaseJenisKegiatan
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
