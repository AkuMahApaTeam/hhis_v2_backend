<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Artikel $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' =>  'Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud artikel-create">

    <h1>
        Artikel
        <small>
                        <?= $model->id_artikel ?>
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
