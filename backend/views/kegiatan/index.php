<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\MasterKegiatanSearch $searchModel
 */

$this->title = 'Data Kegiatan';
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">' . $actionColumnTemplateString . '</div>';
?>
<div class="giiant-crud master-kegiatan-index">

    <?php
    //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">


            <?=
            \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id' => 'giiant-relations',
                    'encodeLabel' => false,
                    'label' => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
                    'dropdown' => [
                        'options' => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items' => [
                            [
                                'url' => ['jenis-kegiatan/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Jenis Kegiatan',
                            ],
                            [
                                'url' => ['master-kontrak/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Kontrak',
                            ],
                            [
                                'url' => ['master-tahun-ajar/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Tahun Ajaran',
                            ],
                            [
                                'url' => ['master-mitra/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Mitra',
                            ],

                        ]
                    ],
                    'options' => [
                        'class' => 'btn-default'
                    ]
                ]
            );
            ?>
        </div>
    </div>

    <br clear="all"><br>

    <div class="clearfix"></div>

    <div class="box box-primary">


        <div class="box-body">
            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => yii\widgets\LinkPager::className(),
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                    ],
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                    'headerRowOptions' => ['class' => 'x'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => $actionColumnTemplateString,
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    $options = [
                                        'title' => 'View',
                                        'aria-label' => 'View',
                                        'data-pjax' => '0',
                                    ];
                                    return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, $options);
                                }
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                // using the column name as key, not mapping to 'id' like the standard generator
                                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                                return Url::toRoute($params);
                            },
                            'contentOptions' => ['nowrap' => 'nowrap']
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

                        [
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (Yii::$app->user->identity->role == 2 && $data->status == 0) {
                                    return $b = Html::a("<i>Approve</i>", ['approve', 'id' => $data->id], [
                                        "class" => "btn btn-sm btn-primary",
                                        "data-toggle" => "tooltip",
                                        "data-placement" => "bottom",
                                        "title" => "Approve",
                                    ]);
                                } else if (Yii::$app->user->identity->role == 2 && $data->status == 1) {
                                    return "";
                                }
                                return "";
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


    <?php \yii\widgets\Pjax::end() ?>


