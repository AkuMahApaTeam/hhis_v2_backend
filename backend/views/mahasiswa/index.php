<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\MahasiswaSearch $searchModel
 */

$this->title = 'Data Alumni';
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span
    class="fa fa-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}

?>
<div class="giiant-crud mahasiswa-index">

    <?php //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <div class="pull-left">
        <?= Html::a('<span class="fa fa-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="pull-right">


        <?=
        \yii\bootstrap\ButtonDropdown::widget(
            [
                'id' => 'giiant-relations',
                'encodeLabel' => false,
                'label' => '<span class="fa fa-paperclip"></span> ' . 'Relations',
                'dropdown' => [
                    'options' => [
                        'class' => 'dropdown-menu-right'
                    ],
                    'encodeLabels' => false,
                    'items' => [[
                        'url' => ['jurusan/index'],
                        'label' => '<i class="fa fa-arrow-right">&nbsp;' . 'Jurusan' . '</i>',
                    ], [
                        'url' => ['fakultas/index'],
                        'label' => '<i class="fa fa-arrow-right">&nbsp;' . 'Fakultas' . '</i>',
                    ],]
                ],
                'options' => [
                    'class' => 'btn-default'
                ]
            ]
        );
        ?>    </div>
</div><br clear="all"><br>

<div class="clearfix"></div>

<div class="box box-primary">

    <div class="box-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class' => 'x'],
                'columns' => [

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $actionColumnTemplateString,
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                            $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                            return Url::toRoute($params);
                        },
                        'contentOptions' => ['nowrap' => 'nowrap']
                    ],
                    'nama_lengkap',
                    'nimrn',
                    'alamat',
                    'fakultas',
                    'jurusan',
                    'tahun_masuk',
                    [
                        'attribute'=>'aprroved',
                        'format'=>'raw',
                        'value'=>function($data){
                            if($data->aprroved == 1){
                                return "<span class=\"label bg-red\">Belum Valid</span>";
                            }
                            return "<span class=\"label bg-green\">Valid</span>";

                        }
                    ],
                    [
                        'label' => 'Aksi',
                        'format' => "raw",
                        'value' => function ($data) {
                            if ($data->aprroved == 1) {
                                return $b = Html::a("<i class=\"fa fa-check\"></i>", ['approve', 'id' => $data->id], [
                                    "class" => "btn btn-sm btn-primary",
                                    "data-toggle" => "tooltip",
                                    "data-placement" => "bottom",
                                    "title" => "Approve",
                                ]);
                            }
                            return "";

                        }
                    ]
                ],
            ]); ?>
        </div>
    </div>
</div>


<?php \yii\widgets\Pjax::end() ?>


