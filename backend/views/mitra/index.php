<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Progress;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\MasterMitraSearch $searchModel
 */

$this->title = 'Master Mitra';
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
<div class="giiant-crud master-mitra-index">

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
                                'url' => ['kegiatan/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-right"></i> ' . 'Master Kegiatan',
                            ],
                            [
                                'url' => ['kontrak/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-right"></i> ' . 'Master Kontrak',
                            ],
                            [
                                'url' => ['skenario1/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-right"></i> ' . 'Skenario1',
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
                                        'title' => Yii::t('yii', 'View'),
                                        'aria-label' => Yii::t('yii', 'View'),
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
                        // 'id_kota',
                        // 'id_provinsi',
                        //'nama',
                        [
                            'class' => yii\grid\DataColumn::className(),
                            'attribute' => 'nama',
                            'value' => function ($model) {

                                return Html::a($model->nama, ['mitra/view', 'id' => $model->id,], ['data-pjax' => 0]);

                            },
                            'format' => 'raw',
                        ],
                        'email:email',
                        'alamat',
                        'kontak',
                        // 'id_user',
                        /*'id_kategori',*/
                        /*'status_spk',*/
                        [
                            'headerOptions' => ['style' => 'width:20%'],
                            'content' => function ($model) {

                                return Progress::widget([
                                    'bars' => [
                                        ['percent' => Yii::$app->runAction('mitra/persent', ['idMitra' => $model->id]),
                                            'label' => Yii::$app->runAction('mitra/persent', ['idMitra' => $model->id]) . '%',
                                            'options' => ['class' => 'progress-bar-warning']
                                        ],

                                    ]
                                ]);
                            },
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{detail}',
                            'buttons' => [
                                'detail' => function ($url, $model) {
                                    return Html::a("Kontrak", ['/kontrak/detail', 'id' => $model->id], ["class" => "btn btn-sm btn-primary"]);
                                }

                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


    <?php \yii\widgets\Pjax::end() ?>




