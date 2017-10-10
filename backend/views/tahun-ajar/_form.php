<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;

/**
 * @var yii\web\View $this
 * @var app\models\MasterTahunAjar $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="master-tahun-ajar-form">

    <?php $form = ActiveForm::begin([
            'id' => 'MasterTahunAjar',
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <p>


                    <!-- attribute awal -->
                    <?= $form->field($model, 'awal')->widget(DatePicker::className(), ['clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]]); ?>

                    <!-- attribute akhir -->
                    <?= $form->field($model, 'akhir')->widget(DatePicker::className(), ['clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]]); ?>

                    <!-- attribute jeda -->
                    <?= $form->field($model, 'jeda_akhir', [
                        'addon' => [
                            'append' => [
                                'content' => 'Hari',
                            ],
                        ],
                    ])->textInput(); ?>

                    <!-- attribute total_kuota -->
                    <?= $form->field($model, 'total_kuota')->textInput() ?>
                </p>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <?php $this->endBlock(); ?>

        <?=
        Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => 'Master Tahun Ajar',
                        'content' => $this->blocks['main'],
                        'active' => true,
                    ],
                ]
            ]
        );
        ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <p><strong>Catatan</strong> : Jeda pengisian kuota skenario 1 terhitung dari n hari sebelum akhir tahun ajar.</p>

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

