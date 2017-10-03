<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MasterTahunAjar $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Master Tahun Ajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud master-tahun-ajar-create">

    <h1>
        Tahun Ajar 
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
