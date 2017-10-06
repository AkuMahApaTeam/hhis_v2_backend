<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Mahasiswa $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahasiswas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud mahasiswa-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
