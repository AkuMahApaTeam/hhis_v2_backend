<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MasterMitra $model
*/
    
$this->title = 'Master Mitra' . " " . $model->nama . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Master Mitra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud master-mitra-update">

    

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
