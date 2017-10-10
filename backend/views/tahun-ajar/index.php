<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\MasterTahunAjarSearch $searchModel
 */

$this->title = 'Data Tahun Ajaran';
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
<div class="giiant-crud master-tahun-ajar-index">

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
                                'label' => '<i class="glyphicon glyphicon-arrow-right"></i> ' . 'Kegiatan',
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
                        [
                            'attribute' => 'awal',
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
                            'attribute' => 'akhir',
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
                        'total_kuota',
                        [
                            'attribute' => 'jeda_akhir',
                            'value' => function ($model) {
                                return $model->jeda_akhir . ' hari';
                            },
                        ],
                    ],
                ]); ?>
            </div>

            <p><strong>Catatan</strong> : Jeda pengisian kuota skenario 1 terhitung dari n hari sebelum akhir tahun ajar.</p>
        </div>
    </div>


    <?php \yii\widgets\Pjax::end() ?>


