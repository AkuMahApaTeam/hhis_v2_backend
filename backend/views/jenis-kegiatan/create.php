<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\JenisKegiatan $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud jenis-kegiatan-create">

    <h1>
        Jenis Kegiatan
        <small>
                        <?= $model->id ?>
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
