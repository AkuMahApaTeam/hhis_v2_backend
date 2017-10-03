<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Berita $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="berita-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Berita',
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

        <div class="box-body">
            <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'isi')->widget(\yii\redactor\widgets\Redactor::className()) ?>
            <?= $form->field($model, 'gambar')->widget(\kartik\file\FileInput::className(), [
                'options' => ['accept' => 'image/*'],
            ]) ?>
            <?php if ($model->gambar != null) {
                ?>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <img src="<?= Yii::$app->urlManagerFotoBerita->baseUrl . '/' . $model->gambar ?>" width="250" height="150px">
                    </div>
                </div>
            <?php } ?>
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

