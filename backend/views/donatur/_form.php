<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Donatur $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="donatur-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Donatur',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
            'options' => ['enctype' => 'multipart/form-data'],
        ]
    );
    ?>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Form</h3>
        </div>
        <?php
        $data = ["donasi rutin"=>'Donasi Rutin', "donasi per event"=>'Donasi Per Event'];
        ?>
        <div class="box-body">
            <?= $form->field($model, 'donatur')->widget(kartik\select2\Select2::className(),[
                'data'=>\yii\helpers\ArrayHelper::map(\app\models\Mahasiswa::find()->all(),'id','nama_lengkap'),
                'options'=>['prompt'=>'Pilih Donatur']
            ]); ?>
            <?= $form->field($model, 'jenis_donatur')->widget(kartik\select2\Select2::className(),[
                'data'=>$data,
                'options'=>['prompt'=>'Pilih Jenis Donasi']
            ]); ?>
            <?= $form->field($model, 'jumlah')->textInput() ?>
        </div>

        <div class="box-footer">
            <?php echo $form->errorSummary($model); ?>

            <?= Html::submitButton(
                '<span class="fa fa-check"></span> ' .
                ($model->isNewRecord ? 'Create' : 'Save'),
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
            );
            ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>

