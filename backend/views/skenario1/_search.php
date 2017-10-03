<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\models\Skenario1Search $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="skenario1-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'id_mitra') ?>

		<?= $form->field($model, 'id_tahun_ajar') ?>

		<?= $form->field($model, 'jatah_kuota') ?>

		<?= $form->field($model, 'nominal_terbayar') ?>

		<?php // echo $form->field($model, 'diambil') ?>

		<?php // echo $form->field($model, 'request') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
