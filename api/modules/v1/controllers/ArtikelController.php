<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class ArtikelController extends ActiveController
{
  public function behaviors()
  {
      return [
          [
              'class' => \yii\filters\ContentNegotiator::className(),
              'only' => ['index', 'view'],
              'formats' => [
                  'application/json' => \yii\web\Response::FORMAT_JSON,
              ],
          ],
      ];
  }

    public $modelClass = 'api\modules\v1\models\Artikel';
}
