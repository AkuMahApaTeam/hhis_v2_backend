<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\riwayat\Riwayat */

$this->title = 'Update Riwayat: ' . $model->id_riwayat;
$this->params['breadcrumbs'][] = ['label' => 'Riwayats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_riwayat, 'url' => ['view', 'id' => $model->id_riwayat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
