<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\DonasiRutin $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'DonasiRutins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud donasi-rutin-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
