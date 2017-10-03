<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\DonasiSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="donasi-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'id_mahasiswa') ?>

		<?= $form->field($model, 'jumlah') ?>

		<?= $form->field($model, 'tgl_donasi') ?>

		<?= $form->field($model, 'valid') ?>

		<?php // echo $form->field($model, 'tgl_valid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
