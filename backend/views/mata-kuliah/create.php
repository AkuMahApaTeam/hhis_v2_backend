<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\MataKuliah $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'MataKuliahs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud mata-kuliah-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
