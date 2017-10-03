<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\MasterMitraSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="master-mitra-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'id_kota') ?>

		<?= $form->field($model, 'id_provinsi') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'kontak') ?>

		<?php // echo $form->field($model, 'id_user') ?>

		<?php // echo $form->field($model, 'id_kategori') ?>

		<?php // echo $form->field($model, 'status_spk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
