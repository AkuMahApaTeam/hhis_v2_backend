<?php

namespace app\models;

use Yii;
use \app\models\base\MasterKontrak as BaseMasterKontrak;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_kontrak".
 */
class MasterKontrak extends BaseMasterKontrak
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
