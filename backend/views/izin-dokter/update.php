<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\IzinDokter $model
*/
    
$this->title = 'Izin Dokter' . " " . $model->id_no_izin . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Izin Dokter', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_no_izin, 'url' => ['view', 'id_no_izin' => $model->id_no_izin]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud izin-dokter-update">

    <h1>
        Izin Dokter
        <small>
                        <?= $model->id_no_izin ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id_no_izin' => $model->id_no_izin], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
