<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Pasien $model
*/
    
$this->title =  'Pasien' . " " . $model->id_pasien . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_pasien, 'url' => ['view', 'id_pasien' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud pasien-update">

    <h1>
        Pasien
        <small>
                        <?= $model->id_pasien ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id_pasien' => $model->id_pasien], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
