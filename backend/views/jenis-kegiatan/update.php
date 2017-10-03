<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\JenisKegiatan $model
*/
    
$this->title =  'Jenis Kegiatan' . " " . $model->type_kegiatan . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' =>  'Jenis Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->type_kegiatan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud jenis-kegiatan-update">


    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
