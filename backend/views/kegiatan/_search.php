<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\MasterKegiatanSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="master-kegiatan-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'id_mitra') ?>

		<?= $form->field($model, 'id_jenis') ?>

		<?= $form->field($model, 'id_kontrak') ?>

		<?= $form->field($model, 'id_tahun_ajar') ?>

		<?php // echo $form->field($model, 'deskripsi_kegiatan') ?>

		<?php // echo $form->field($model, 'nominal') ?>

		<?php // echo $form->field($model, 'tanggal_mulai') ?>

		<?php // echo $form->field($model, 'tanggal_selesai') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'updated_by') ?>

		<?php // echo $form->field($model, 'flag') ?>

		<?php // echo $form->field($model, 'id_jurusan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
