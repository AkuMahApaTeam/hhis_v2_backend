<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Donatur $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donaturs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud donatur-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
