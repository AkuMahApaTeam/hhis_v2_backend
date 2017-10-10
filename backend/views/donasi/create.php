<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Donasi $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud donasi-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
