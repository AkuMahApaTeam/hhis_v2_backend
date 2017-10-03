<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Event $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud event-create">

    <?= $this->render('_form', [
        'model' => $model,
        'roleM' => $roleM,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider
    ]); ?>

</div>
