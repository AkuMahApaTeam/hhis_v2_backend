<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MasterKegiatan $model
*/
    
$this->title = 'Master Kegiatan' . " " . $model->idKontrak->nama . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' =>  'Master Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->idKontrak->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud master-kegiatan-update">


    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
