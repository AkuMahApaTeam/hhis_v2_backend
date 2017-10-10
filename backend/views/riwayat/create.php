<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Riwayat $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' =>  'Riwayats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud riwayat-create">
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
    'modelPasien' => $modelPasien,
    'modelDokter' => $modelDokter,
    ]); ?>

</div>
