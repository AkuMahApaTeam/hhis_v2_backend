<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\riwayat\RiwayatSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.serchfild{
  height: auto;

}
</style>
<div class="riwayat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>


    <div class="form-group">
      <div class="col-md-2">
      </div>
      <div class="col-md-7" style="padding-right:0px">
          <?= $form->field($model, 'nik',[
           'inputOptions' => ['class' => 'form-control serchfild']
     ])->textInput()->input('nik', ['placeholder' => "search by NIK/KTP.."])->label(false); ?>
      </div>
      <div class="col-md-1" style="padding-left:3px">
        <?= Html::submitButton('GO!!', ['class' => 'btn btn-primary tombolgo']) ?>
      </div>
      <div class="col-md-2">

      </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
