<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Jurusan $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jurusans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud jurusan-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
