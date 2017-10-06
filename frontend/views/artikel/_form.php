<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\tinymce\TinyMce;
use zxbodya\yii2\elfinder\TinyMceElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textarea(['rows' => 1]) ?>
    <?= $form->field($model, 'abstrak')->textarea(['rows' => 6]) ?>
	<?=
	$form->field($model, 'deskripsi')->widget(
	    TinyMce::className(),
	    [
	        'fileManager' => [
	            'class' => TinyMceElFinder::className(),
	            'connectorRoute' => 'el-finder/connector',
	        ],
	    ]
	)
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
