<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\RiwayatSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="riwayat-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id_riwayat') ?>

		<?= $form->field($model, 'id_pasien') ?>

		<?= $form->field($model, 'id_dokter') ?>

		<?= $form->field($model, 'umur') ?>

		<?= $form->field($model, 'berat_badan') ?>

		<?php // echo $form->field($model, 'tinggi_badan') ?>

		<?php // echo $form->field($model, 'riwayat_kesehatan_keluarga') ?>

		<?php // echo $form->field($model, 'keluhan_utama') ?>

		<?php // echo $form->field($model, 'diagnosa') ?>

		<?php // echo $form->field($model, 'larangan') ?>

		<?php // echo $form->field($model, 'note') ?>

		<?php // echo $form->field($model, 'tgl_periksa') ?>

		<?php // echo $form->field($model, 'perawatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
