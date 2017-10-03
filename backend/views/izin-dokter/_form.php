<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;

/**
* @var yii\web\View $this
* @var app\models\IzinDokter $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="izin-dokter-form">

    <?php $form = ActiveForm::begin([
    'id' => 'IzinDokter',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute no_izin -->
			<?= $form->field($model, 'no_izin')->textInput(['maxlength' => true]) ?>

<!-- attribute keahlian -->

 <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
            $form->field($model, 'keahlian')->widget(\kartik\select2\Select2::className(), [
                'data' => ArrayHelper::map(app\models\Spesialis::find()->all(), 'id', 'spesialis'),
                'disabled' => \Yii::$app->user->identity->role == 6 ? true : false,
                'options' => [
                    'prompt' => 'Pilih Spesialis',
                ],
            ])->label('Keahlian Dokter'); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   =>  'IzinDokter',
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
