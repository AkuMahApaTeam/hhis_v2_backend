<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\PasienSearch $searchModel
*/

$this->title =  'Pasiens';
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud pasien-index">

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

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
            'items' => 
            [
            [
                'url' => ['riwayat/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-right"></i> ' .  'Riwayat',
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

    <hr />
     <div class="box box-warning">
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
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [
                          [
            'class' => 'yii\grid\ActionColumn',
            'template' => $actionColumnTemplateString,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                if (Yii::$app->user->identity->role == 7) {
                    $options = [
                        'title' =>  'View',
                        'aria-label' => 'View',
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-file"></span>', $url, $options);
                }
            }
            ],
            'urlCreator' => function($action, $model, $key, $index) {
            if (Yii::$app->user->identity->role == 7) {

                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            }
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
          [
            'header' => 'Cari Pasien by NIK',
            'attribute' => 'nik',
            'format' => 'raw',
         ],
         [
            'header' => 'Nama Pasien',
            'attribute' => 'nama_pasien',
            'format' => 'raw',
         ],
         [
            'header' => 'Alamat',
            'attribute' => 'alamat',
            'format' => 'raw',
         ],
         [
            'header' => 'No Telp',
            'attribute' => 'no_telp_pasien',
            'format' => 'raw',
         ],
         [
            'header' => 'Golongan Darah',
            'attribute' => 'gol_darah',
            'format' => 'raw',
         ],
         [
            'header' => 'Jenis Kelamin',
            'attribute' => 'jenis_kelamin',
            'format' => 'raw',
         ],
        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{detail}',
                            'buttons' => [
                                'detail' => function ($url, $model) {
                                    return Html::a("Lihat Riwayat", ['/riwayat/detail', 'id' => $model->id_pasien], ["class" => "btn btn-sm btn-success"]);
                                }

                            ]
         ],
    

        ],
        ]); ?>
    </div>
</div>
</div>

</div>


<?php \yii\widgets\Pjax::end() ?>


