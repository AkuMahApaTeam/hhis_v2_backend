<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Berita $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berita'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud berita-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
