<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Pasien $model
*/
$copyParams = $model->attributes;

$this->title = 'Pasien';
$this->params['breadcrumbs'][] = ['label' =>  'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_pasien, 'url' => ['view', 'id_pasien' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud pasien-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        Pasien
        <small>
            <?= $model->id_pasien ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id_pasien' => $model->id_pasien],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'id_pasien' => $model->id_pasien, 'Pasien'=>$copyParams],
            ['class' => 'btn btn-success']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr />

    <?php $this->beginBlock('app\models\Pasien'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'nik',
        'id_kota',
        'id_provinsi',
        'id_user',
        'nama_pasien',
        'alamat',
        'no_telp_pasien',
        'gol_darah',
        'jenis_kelamin',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id_pasien' => $model->id_pasien],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Riwayats'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Riwayats',
            ['riwayat/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Riwayat',
            ['riwayat/create', 'Riwayat' => ['id_pasien' => $model->id_pasien]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Riwayats', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Riwayats ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getRiwayats(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-riwayats',
        ]
    ]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel'  => 'Last'
    ],
    'columns' => [
 [
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'riwayat' . '/' . $action;
        $params['Riwayat'] = ['id_pasien' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'riwayat'
],
        'id_riwayat',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'id_dokter',
    'value' => function ($model) {
        if ($rel = $model->getIdDokter()->one()) {
            return Html::a($rel->id_dokter, ['dokter/view', 'id_dokter' => $rel->id_dokter,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
        'umur',
        'berat_badan',
        'tinggi_badan',
        'riwayat_kesehatan_keluarga:ntext',
        'keluhan_utama:ntext',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
[
    'class' => yii\grid\DataColumn::className(),
    'attribute' => 'diagnosa',
    'value' => function ($model) {
        if ($rel = $model->getDiagnosa()->one()) {
            return Html::a($rel->id, ['daftar-penyakit/view', 'id' => $rel->id,], ['data-pjax' => 0]);
        } else {
            return '';
        }
    },
    'format' => 'raw',
],
        'larangan:ntext',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [
 [
    'label'   => '<b class=""># '.$model->id_pasien.'</b>',
    'content' => $this->blocks['app\models\Pasien'],
    'active'  => true,
],
[
    'content' => $this->blocks['Riwayats'],
    'label'   => '<small>Riwayats <span class="badge badge-default">'.count($model->getRiwayats()->asArray()->all()).'</span></small>',
    'active'  => false,
],
 ]
                 ]
    );
    ?>
</div>