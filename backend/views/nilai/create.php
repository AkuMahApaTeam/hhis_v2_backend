<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Nilai $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nilais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud nilai-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
