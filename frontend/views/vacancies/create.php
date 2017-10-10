<?php
$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-form">
    <div class="company-banner has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl.'/' ?>img/company-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>HeadHunters are<br> Hunting for talent</h3>
                </div>
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
        ]); ?>
</div>
<br>
<hr>
