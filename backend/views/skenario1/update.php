<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Skenario1 $model
*/
    
$this->title = 'Skenario1' . " " . $model->id . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Skenario1', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud skenario1-update">


    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
