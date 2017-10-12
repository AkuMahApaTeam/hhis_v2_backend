<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\pasien\PasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.serchfild{
  height: auto;
}
</style>
<div class="pasien-search">
  <div class="row">
    <div class="col-md-10">
    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'nik',[
     'inputOptions' => ['class' => 'form-control serchfild']
  ])->textInput()->input('nik', ['placeholder' => "search by NIK/KTP.."])->label(false); ?>

</div>
<div class="col-md-2" style="margin:0px;padding:0px">
    <div class="form-group">
        <?= Html::submitButton('GO!!', ['class' => 'btn btn-primary']) ?>
    </div>

</div>
    <?php ActiveForm::end(); ?>

</div>
</div>
