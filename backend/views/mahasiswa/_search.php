<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\MahasiswaSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="mahasiswa-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nama_lengkap') ?>

		<?= $form->field($model, 'nimrn') ?>

		<?= $form->field($model, 'tempat_lahir') ?>

		<?= $form->field($model, 'tanggal_lahir') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'tahun_masuk') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'foto') ?>

		<?php // echo $form->field($model, 'fakultas') ?>

		<?php // echo $form->field($model, 'jurusan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
