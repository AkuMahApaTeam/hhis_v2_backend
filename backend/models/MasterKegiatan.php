<?php

namespace app\models;

use Yii;
use \app\models\base\MasterKegiatan as BaseMasterKegiatan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_kegiatan".
 */
class MasterKegiatan extends BaseMasterKegiatan
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
