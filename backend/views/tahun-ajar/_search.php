<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\MasterTahunAjarSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="master-tahun-ajar-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'awal') ?>

		<?= $form->field($model, 'akhir') ?>

		<?= $form->field($model, 'total_kuota') ?>
        <?= $form->field($model, 'jeda_akhir') ?> 

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
