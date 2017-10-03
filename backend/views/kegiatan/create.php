<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MasterKegiatan $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Master Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud master-kegiatan-create">

    <h1>
        Kegiatan
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
