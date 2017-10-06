<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\Pasien $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Pasien',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute nik -->
			<?= $form->field($model, 'nik')->textInput() ?>

<!-- attribute id_kota -->
			<?= $form->field($model, 'id_kota')->textInput() ?>

<!-- attribute id_provinsi -->
			<?= $form->field($model, 'id_provinsi')->textInput() ?>

<!-- attribute id_user -->
			<?= $form->field($model, 'id_user')->textInput() ?>

<!-- attribute nama_pasien -->
			<?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

<!-- attribute alamat -->
			<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

<!-- attribute no_telp_pasien -->
			<?= $form->field($model, 'no_telp_pasien')->textInput(['maxlength' => true]) ?>

<!-- attribute gol_darah -->
			<?= $form->field($model, 'gol_darah')->textInput(['maxlength' => true]) ?>

<!-- attribute jenis_kelamin -->
			<?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   =>  'Pasien',
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

