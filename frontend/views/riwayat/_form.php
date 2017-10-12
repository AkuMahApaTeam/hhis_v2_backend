<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\riwayat\Riwayat */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="riwayat-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->textInput(['readonly'=>true,'value'=> $modelPasien->id_pasien]) ?>

    <?= $form->field($model, 'id_dokter')->textInput(['readonly'=>true,'value'=> $modelDokter->id_dokter]) ?>

    <?= $form->field($model, 'umur')->textInput() ?>

    <?= $form->field($model, 'berat_badan')->textInput() ?>

    <?= $form->field($model, 'tinggi_badan')->textInput() ?>

    <?= $form->field($model, 'riwayat_kesehatan_keluarga')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keluhan_utama')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diagnosa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'larangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tgl_periksa')->textInput(['readonly'=>true,'value'=> date('Y-m-d')]) ?>

    <?= $form->field($model, 'perawatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
