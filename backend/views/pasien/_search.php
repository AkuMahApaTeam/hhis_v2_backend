<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\PasienSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pasien-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id_pasien') ?>

		<?= $form->field($model, 'nama_pasien') ?>

		<?= $form->field($model, 'alamat') ?>

		<?= $form->field($model, 'no_telp_pasien') ?>

		<?= $form->field($model, 'gol_darah') ?>

		<?php // echo $form->field($model, 'jenis_kelamin') ?>

		<?php // echo $form->field($model, 'nik') ?>

		<?php // echo $form->field($model, 'id_kota') ?>

		<?php // echo $form->field($model, 'id_provinsi') ?>

		<?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
