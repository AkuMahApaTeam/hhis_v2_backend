<?php

namespace frontend\models;

use Yii;
use \frontend\models\base\KomentarForum as BaseKomentarForum;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "komentar_forum".
 */
class KomentarForum extends BaseKomentarForum
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
