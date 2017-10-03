<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\DokterSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="dokter-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id_dokter') ?>

		<?= $form->field($model, 'id_no_izin') ?>

		<?= $form->field($model, 'email') ?>

		<?= $form->field($model, 'alamat_rumah') ?>

		<?= $form->field($model, 'alamat_praktik') ?>

		<?php // echo $form->field($model, 'nama_dokter') ?>

		<?php // echo $form->field($model, 'no_telp') ?>

		<?php // echo $form->field($model, 'password') ?>

		<?php // echo $form->field($model, 'id_kota') ?>

		<?php // echo $form->field($model, 'id_provinsi') ?>

		<?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
