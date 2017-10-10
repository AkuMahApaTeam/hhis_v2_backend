<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\DonasiEvent $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'DonasiEvents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud donasi-event-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
