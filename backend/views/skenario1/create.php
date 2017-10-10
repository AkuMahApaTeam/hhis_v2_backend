<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Skenario1 $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Skenario1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud skenario1-create">

    <h1>
        Skenario1
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
