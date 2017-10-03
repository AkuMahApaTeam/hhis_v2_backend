<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\MasterMitra $model
 */
$copyParams = $model->attributes;

$this->title = 'Master Mitra';
$this->params['breadcrumbs'][] = ['label' => 'Master Mitra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud master-mitra-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        Mitra
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
                ['create', 'id' => $model->id, 'MasterMitra' => $copyParams],
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

    <?php $this->beginBlock('app\models\MasterMitra'); ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'email:email',
            [
                'attribute' => 'alamat',
                'value' => function ($model) {
                    return $model->alamat.', '.
                        \app\models\Kabupaten::findOne($model->id_kota)->nama.', '.
                        \app\models\Provinsi::findOne($model->id_provinsi)->nama;
                },
            ],
            'idKategori.nama',
            'kontak',
            //'id_user',
            'status_spk',
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
                ['kegiatan/index'],
                ['class' => 'btn text-muted btn-xs']
            ) ?>
            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Master Kegiatan',
                ['kegiatan/create', 'MasterKegiatan' => ['id_mitra' => $model->id]],
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
            'query' => $model->getMasterKegiatans()->andWhere('flag=1'),
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
                    $params[0] = 'kegiatan' . '/' . $action;
                    $params['MasterKegiatan'] = ['id_mitra' => $model->primaryKey()[0]];
                    return $params;
                },
                'buttons' => [

                ],
                'controller' => 'kegiatan'
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


    <?php $this->beginBlock('MasterKontraks'); ?>
    <div style='position: relative'>
        <div style='position:absolute; right: 0px; top: 0px;'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Master Kontraks',
                ['kontrak/index'],
                ['class' => 'btn text-muted btn-xs']
            ) ?>
            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Master Kontrak',
                ['kontrak/create', 'MasterKontrak' => ['id_mitra' => $model->id]],
                ['class' => 'btn btn-success btn-xs']
            ); ?>
        </div>
    </div>
    <?php Pjax::begin(['id' => 'pjax-MasterKontraks', 'enableReplaceState' => false, 'linkSelector' => '#pjax-MasterKontraks ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <?=
    '<div class="table-responsive">'
    . \kartik\grid\GridView::widget([
        'layout' => '{summary}{pager}<br/>{items}{pager}',
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getMasterKontraks()->andWhere('flag=1'),
            'pagination' => [
                'pageSize' => 20,
                'pageParam' => 'page-masterkontraks',
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
                    $params[0] = 'master-kontrak' . '/' . $action;
                    $params['MasterKontrak'] = ['id_mitra' => $model->primaryKey()[0]];
                    return $params;
                },
                'buttons' => [

                ],
                'controller' => 'master-kontrak'
            ],
            'nama',
            // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'attribute' => 'id_mitra',
                'format' => 'raw',
                'visible' => \Yii::$app->user->identity->role == 6 ? false : true,
                'value' => function ($model) {
                    return Html::a($model->idMitra->nama, ['mitra/view', 'id' => $model->idMitra->id,]);
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\MasterMitra::find()->asArray()->all(), 'id', 'nama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Mitra']
            ],
            [
                'attribute' => 'nilai_kontrak',
                'format' => 'raw',
                'value' => function ($data) {
                    return Yii::$app->runAction('kontrak/rupiah', ['nilai' => $data->nilai_kontrak]);
                }
            ],
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
                'attribute' => 'tanggal_berakhir',
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
            //'flag',
            [
                'headerOptions' => ['style' => 'width:20%'],
                'content' => function ($model) {

                    return \yii\bootstrap\Progress::widget([
                        'bars' => [
                            ['percent' => Yii::$app->runAction('kontrak/persent', ['idKontrak' => $model->id]),
                                'label' => Yii::$app->runAction('kontrak/persent', ['idKontrak' => $model->id]) . '%',
                                'options' => ['class' => 'progress-bar-warning']
                            ],

                        ]
                    ]);
                },
            ],
        ]
    ])
    . '</div>'
    ?>
    <?php Pjax::end() ?>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Skenario1s'); ?>
    <div style='position: relative'>
        <div style='position:absolute; right: 0px; top: 0px;'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Skenario1s',
                ['skenario1/index'],
                ['class' => 'btn text-muted btn-xs']
            ) ?>

        </div>
    </div>
    <?php Pjax::begin(['id' => 'pjax-Skenario1s', 'enableReplaceState' => false, 'linkSelector' => '#pjax-Skenario1s ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <?=
    '<div class="table-responsive">'
    . \yii\grid\GridView::widget([
        'layout' => '{summary}{pager}<br/>{items}{pager}',
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getSkenario1s(),
            'pagination' => [
                'pageSize' => 20,
                'pageParam' => 'page-skenario1s',
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
                    $params[0] = 'skenario1' . '/' . $action;
                    $params['Skenario1'] = ['id_mitra' => $model->primaryKey()[0]];
                    return $params;
                },
                'buttons' => [

                ],
                'controller' => 'skenario1'
            ],
            'id',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'id_tahun_ajar',
                'value' => function ($model) {
                    if ($rel = $model->getIdTahunAjar()->one()) {
                        return Html::a($rel->awal . ' ' . '/' . ' ' . $rel->akhir, ['master-tahun-ajar/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                'format' => 'raw',
            ],
            'jatah_kuota',
            [
                'attribute' => 'nominal_terbayar',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::label(Yii::$app->runAction('skenario1/rupiah', ['nilai' => $data->nominal_terbayar]));

                }
            ],

            'diambil',
            'request',
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
                    'content' => $this->blocks['app\models\MasterMitra'],
                    'active' => true,
                ],
                [
                    'content' => $this->blocks['MasterKegiatans'],
                    'label' => '<small>Master Kegiatan <span class="badge badge-default">' . count($model->getMasterKegiatans()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
                [
                    'content' => $this->blocks['MasterKontraks'],
                    'label' => '<small>Master Kontrak <span class="badge badge-default">' . count($model->getMasterKontraks()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
                [
                    'content' => $this->blocks['Skenario1s'],
                    'label' => '<small>Skenario1 <span class="badge badge-default">' . count($model->getSkenario1s()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],

            ]
        ]
    );
    ?>
</div>
