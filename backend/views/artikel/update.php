<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Artikel $model
*/
    
$this->title = Yii::t('models', 'Artikel') . " " . $model->id_artikel . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Artikel', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_artikel, 'url' => ['view', 'id_artikel' => $model->id_artikel]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud artikel-update">

    <h1>
        <?= Yii::t('models', 'Artikel') ?>
        <small>
                        <?= $model->id_artikel ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id_artikel' => $model->id_artikel], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
