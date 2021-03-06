<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MasterKontrak $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' =>  'Master Kontraks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud master-kontrak-create">

    <h1>
        Kontrak
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
