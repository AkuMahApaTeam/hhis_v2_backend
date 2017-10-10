<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\Artikel $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="artikel-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Artikel',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute judul -->
			<?= $form->field($model, 'judul')->textarea(['rows' => 6]) ?>

<!-- attribute deskripsi -->
			<?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

<!-- attribute abstrak -->
			<?= $form->field($model, 'abstrak')->textarea(['rows' => 6]) ?>

<!-- attribute image -->
			<?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   =>  'Artikel',
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

