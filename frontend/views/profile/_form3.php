<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="mhs-minat-form">

    <?php $form = ActiveForm::begin([
            'id' => 'MhsMinat',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
            'options' => ['enctype' => 'multipart/form-data'],
        ]
    );
    ?>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <?=
            \dosamigos\selectize\SelectizeTextInput::widget([
                'name'=>'selected_minat',
                'id'=>'selected_minat',
                'loadUrl' => ['profile/listm'],
                'options' => ['class' => 'form-control'],
                'clientOptions' => [
                    'plugins' => ['remove_button'],
                    'valueField' => 'id',
                    'labelField' => 'name',
                    'searchField' => ['name'],
                    'create' => true,
                ]
            ]);
            ?>

        </div>

        <div class="box-footer">

            <?= Html::submitButton(
                '<span class="fa fa-check"></span> Add',
                [
                    'id' => 'save- Skill',
                    'class' => 'btn btn-success'
                ]
            );
            ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>

