<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Fakultas $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud fakultas-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
