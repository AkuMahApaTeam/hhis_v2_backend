<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MasterKontrak $model
*/
    
$this->title =  'Master Kontrak' . " " . $model->nama . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' =>  'Master Kontrak', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud master-kontrak-update">


    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
