<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\dokter\DokterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dokters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dokter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_dokter',
            'id_no_izin',
            'email:email',
            'alamat_rumah',
            'alamat_praktik',
            // 'nama_dokter',
            // 'no_telp',
            // 'password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
