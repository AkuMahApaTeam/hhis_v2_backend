<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\models\Forum $model
 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subheader subheader-v2 has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/forum.jpg"
     style="padding: 0">
    <div class="container" style="background-color: rgba(0,0,0,0.4); width: 100%; height: 300px">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top: 95px;">
                <h1 class="block-title">
                    DISSCUSSION GROUP</h1>

                <p class="block-secondary-title invert">Alumni Forum Place</p>
            </div>
        </div>
    </div>
</div>
<div class="container">


    <hr/>

    <?= $this->render('_form', [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
        'model' => $model,
        'roleM' => $roleM,
    ]); ?>
</div>
<br>
<hr>