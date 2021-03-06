<?php

namespace app\models;

use Yii;
use \app\models\base\MasterKategoriMitra as BaseMasterKategoriMitra;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_kategori_mitra".
 */
class MasterKategoriMitra extends BaseMasterKategoriMitra
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
