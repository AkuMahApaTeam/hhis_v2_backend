<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Dokter $model
*/
    
$this->title = Yii::t('models', 'Dokter') . " " . $model->id_dokter . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Dokter', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_dokter, 'url' => ['view', 'id_dokter' => $model->id_dokter]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud dokter-update">

    <h1>
        <?= Yii::t('models', 'Dokter') ?>
        <small>
                        <?= $model->id_dokter ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id_dokter' => $model->id_dokter], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
