<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\LokerSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="loker-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'judul') ?>

		<?= $form->field($model, 'nama_kantor') ?>

		<?= $form->field($model, 'isi') ?>

		<?= $form->field($model, 'tanggal') ?>

		<?php // echo $form->field($model, 'lokasi') ?>

		<?php // echo $form->field($model, 'jenis_karyawan') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'kontak') ?>

		<?php // echo $form->field($model, 'url') ?>

		<?php // echo $form->field($model, 'id_mahasiswa') ?>

		<?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
