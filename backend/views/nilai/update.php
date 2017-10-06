<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Nilai $model
*/

$this->title = 'Edit ' . Yii::t('app', 'Nilai') ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nilai'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->mahasiswa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud nilai-update">

    <div class="crud-navigation">
        <?= Html::a('<span class="fa fa-eye-open"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <br clear="all" />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
