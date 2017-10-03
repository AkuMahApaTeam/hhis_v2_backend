<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\IzinDokter $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' =>  'Izin Dokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud izin-dokter-create">

    <h1>
         Izin Dokter
        <small>
                        <?= $model->id_no_izin ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
