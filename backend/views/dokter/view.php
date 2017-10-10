<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Dokter $model
*/
$copyParams = $model->attributes;

$this->title =  'Dokter';
$this->params['breadcrumbs'][] = ['label' =>  'Dokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_dokter, 'url' => ['view', 'id_dokter' => $model->id_dokter]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud dokter-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        'Dokter'
        <small>
            <?= $model->id_dokter ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id_dokter' => $model->id_dokter],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'id_dokter' => $model->id_dokter, 'Dokter'=>$copyParams],
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

    <?php $this->beginBlock('app\models\Dokter'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
    // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
[
    'format' => 'html',
    'attribute' => 'id_no_izin',
    'value' => ($model->getIdNoIzin()->one() ? 
        Html::a('<i class="glyphicon glyphicon-list"></i>', ['izin-dokter/index']).' '.
        Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> '.$model->getIdNoIzin()->one()->id_no_izin, ['izin-dokter/view', 'id_no_izin' => $model->getIdNoIzin()->one()->id_no_izin,]).' '.
        Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'Dokter'=>['id_no_izin' => $model->id_no_izin]])
        : 
        '<span class="label label-warning">?</span>'),
],
        'password',
        'id_kota',
        'id_provinsi',
        'id_user',
        'email:email',
        'alamat_rumah',
        'alamat_praktik',
        'nama_dokter',
        'no_telp',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id_dokter' => $model->id_dokter],
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
            ['riwayat/create', 'Riwayat' => ['id_dokter' => $model->id_dokter]],
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
        $params['Riwayat'] = ['id_dokter' => $model->primaryKey()[0]];
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
    'attribute' => 'id_pasien',
    'value' => function ($model) {
        if ($rel = $model->getIdPasien()->one()) {
            return Html::a($rel->id_pasien, ['pasien/view', 'id_pasien' => $rel->id_pasien,], ['data-pjax' => 0]);
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
    'label'   => '<b class=""># '.$model->id_dokter.'</b>',
    'content' => $this->blocks['app\models\Dokter'],
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
