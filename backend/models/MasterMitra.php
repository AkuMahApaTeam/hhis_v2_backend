<?php

namespace app\models;

use Yii;
use \app\models\base\MasterMitra as BaseMasterMitra;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_mitra".
 */
class MasterMitra extends BaseMasterMitra
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
