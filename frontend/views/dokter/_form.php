<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\dokter\Dokter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_no_izin')->textInput()?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_rumah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_praktik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dokter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
