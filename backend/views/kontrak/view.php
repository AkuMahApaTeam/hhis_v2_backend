<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\MasterKontrak $model
 */
$copyParams = $model->attributes;

$this->title = 'Master Kontrak';
$this->params['breadcrumbs'][] = ['label' => 'Master Kontraks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud master-kontrak-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        Kontrak
        <small>
            <?= $model->nama ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-info']) ?>

            <?= Html::a(
                '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
                ['create', 'id' => $model->id, 'MasterKontrak' => $copyParams],
                ['class' => 'btn btn-success']) ?>

            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
                ['create'],
                ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
                . 'Full list', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('app\models\MasterKontrak'); ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'id_mitra',
                'value' => Html::a($model->idMitra->nama, ['mitra/view', 'id' => $model->idMitra->id,]),
                'visible' => \Yii::$app->user->identity->role == 6 ? false : true,
            ],
            [
                'attribute' => 'nilai_kontrak',
                'format' => 'raw',
                'value' => function ($data) {
                    return Yii::$app->runAction('kontrak/rupiah', ['nilai' => $data->nilai_kontrak]);
                }
            ],
            'tanggal_mulai:date',
            'tanggal_berakhir:date',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role != 2 && $data->status == 0) {
                        return "<span class=\"label bg-red\">Belum di Approve</span>";
                    } else if (Yii::$app->user->identity->role != 2 && $data->status == 1) {
                        return "<span class=\"label bg-green\">Approved</span>";
                    } else if (Yii::$app->user->identity->role == 2 && $data->status == 0) {
                        return "<span class=\"label bg-red\">Belum di Approve</span>";
                    }
                    return "<span class=\"label bg-green\">Approved</span>";
                }
            ],
//            'flag',
        ],
    ]); ?>


    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Are you sure to delete this item?' . '',
            'data-method' => 'post',
        ]); ?>
    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('MasterKegiatans'); ?>
    <div style='position: relative'>
        <div style='position:absolute; right: 0px; top: 0px;'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Master Kegiatans',
                ['master-kegiatan/index'],
                ['class' => 'btn text-muted btn-xs']
            ) ?>
            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Master Kegiatan',
                ['master-kegiatan/create', 'MasterKegiatan' => ['id_kontrak' => $model->id]],
                ['class' => 'btn btn-success btn-xs']
            ); ?>
        </div>
    </div>
    <?php Pjax::begin(['id' => 'pjax-MasterKegiatans', 'enableReplaceState' => false, 'linkSelector' => '#pjax-MasterKegiatans ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <?=
    '<div class="table-responsive">'
    . \kartik\grid\GridView::widget([
        'layout' => '{summary}{pager}<br/>{items}{pager}',
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getMasterKegiatans(),
            'pagination' => [
                'pageSize' => 20,
                'pageParam' => 'page-masterkegiatans',
            ]
        ]),
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'contentOptions' => ['nowrap' => 'nowrap'],
                'urlCreator' => function ($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                    $params[0] = 'master-kegiatan' . '/' . $action;
                    $params['MasterKegiatan'] = ['id_kontrak' => $model->primaryKey()[0]];
                    return $params;
                },
                'buttons' => [

                ],
                'controller' => 'master-kegiatan'
            ],
            // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'attribute' => 'id_mitra',
                'value' => function ($model) {
                    return Html::a($model->idMitra->nama, ['mitra/view', 'id' => $model->idMitra->id,]);
                },
                'format' => 'raw',
                'visible' => \Yii::$app->user->identity->role == 6 ? false : true,
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\MasterMitra::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Mitra']
            ],
            // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'attribute' => 'id_jenis',
                'value' => function ($model) {
                    return $model->idJenis->type_kegiatan;
                },
                'format' => 'raw',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\JenisKegiatan::find()->asArray()->all(), 'id', 'type_kegiatan'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Jenis']
            ],
            // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'attribute' => 'id_kontrak',
                'value' => function ($model) {
                    return Html::a($model->idKontrak->nama, ['kontrak/view', 'id' => $model->idKontrak->id,]);
                },
                'format' => 'raw',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \Yii::$app->user->identity->role == 6 ? \yii\helpers\ArrayHelper::map(\app\models\MasterKontrak::find()->where(['id_mitra' => \Yii::$app->user->identity->masterMitra->id])->asArray()->all(), 'id', 'nama') : \yii\helpers\ArrayHelper::map(\app\models\MasterKontrak::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Kontrak']
            ],
            // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'attribute' => 'id_tahun_ajar',
                'value' => function ($model) {
                    $formatter = Yii::$app->formatter;
                    return $formatter->asDate($model->idTahunAjar->awal).' / '.$formatter->asDate($model->idTahunAjar->akhir);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'nominal',
                'format' => 'raw',
                'value' => function ($data) {
                    return Yii::$app->runAction('kegiatan/rupiah', ['nilai' => $data->nominal]);
                }
            ],
            // 'nominal',
            [
                'attribute' => 'tanggal_mulai',
                'format' => 'date',
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' =>([
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format' => 'php:Y-m-d',
                        'autoclose'=>true,
                        'opens'=>'left',
                    ],
                ]),
            ],
            [
                'attribute' => 'tanggal_selesai',
                'format' => 'date',
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' =>([
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format' => 'php:Y-m-d',
                        'autoclose'=>true,
                        'opens'=>'left',
                    ],
                ]),
            ],
            /*'flag',*/
            [
                'attribute' => 'id_jurusan',
                'value' => function ($model) {
                    return $model->idJurusan->nama_jurusan;
                },
                'format' => 'raw',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Jurusan::find()->asArray()->all(), 'id', 'nama_jurusan'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Jurusan']
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($data) {
                    if (Yii::$app->user->identity->role != 2 && $data->status == 0) {
                        return "<span class=\"label bg-red\">Belum di Approve</span>";
                    } else if (Yii::$app->user->identity->role != 2 && $data->status == 1) {
                        return "<span class=\"label bg-green\">Approved</span>";
                    } else if (Yii::$app->user->identity->role == 2 && $data->status == 0) {
                        return "<span class=\"label bg-red\">Belum di Approve</span>";
                    }
                    return "<span class=\"label bg-green\">Approved</span>";
                }
            ],
            /*'flag',*/
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
                    'label' => '<b class=""># ' . $model->nama . '</b>',
                    'content' => $this->blocks['app\models\MasterKontrak'],
                    'active' => true,
                ],
                [
                    'content' => $this->blocks['MasterKegiatans'],
                    'label' => '<small>Master Kegiatans <span class="badge badge-default">' . count($model->getMasterKegiatans()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
            ]
        ]
    );
    ?>
</div>
