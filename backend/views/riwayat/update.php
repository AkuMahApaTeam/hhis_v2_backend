<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Riwayat $model
*/
    
$this->title =  'Riwayat' . " " . $model->id_riwayat . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Riwayat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_riwayat, 'url' => ['view', 'id_riwayat' => $model->id_riwayat]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud riwayat-update">

    <h1>
        Riwayat
        <small>
                        <?= $model->id_riwayat ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id_riwayat' => $model->id_riwayat], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
