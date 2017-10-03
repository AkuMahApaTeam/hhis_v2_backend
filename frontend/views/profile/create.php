<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Jurusan $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="giiant-crud mhs-pekerjaan-create">

    <?= $this->renderAjax('_form2', [
        'model' => $model,
    ]); ?>

</div>
