<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\pasien\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gol_darah')->dropdownList(['O'=>'O','AB'=>'AB','B'=>'B','A'=>'A']) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropdownList(['LAKI-LAKI'=>'Laki-Laki','PEREMPUAN'=>'Perempuan']) ?>

    <?= $form->field($model, 'nik')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Daftarkan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
