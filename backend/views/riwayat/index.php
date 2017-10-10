<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\models\RiwayatSearch $searchModel
*/

$this->title =  'Riwayats';
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
<div class="giiant-crud riwayat-index">

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create','id'=>$modelPasien->id_pasien,'username'=>Yii::$app->user->identity->username], ['class' => 'btn btn-success']) ?>
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
                'url' => ['pasien/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' .  'Pasien',
            ],
                                [
                'url' => ['dokter/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' .  'Dokter',
            ],
                                [
                'url' => ['daftar-penyakit/index'],
                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Daftar Penyakit',
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
                    // 'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
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
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
           'tgl_periksa',
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'id_pasien',
                'label' => 'Nama Pasien',
                'value' => function ($model) {
                    if ($rel = $model->getIdPasien()->one()) {
                        return Html::a($rel->nama_pasien, ['pasien/view', 'id_pasien' => $rel->id_pasien,], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                'format' => 'raw',
            ],
                    'umur',
            'berat_badan',
            'tinggi_badan',
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
			[
			    'class' => yii\grid\DataColumn::className(),
			    'attribute' => 'id_dokter',
                'label' => 'Oleh Dokter',
			    'value' => function ($model) {
			        if ($rel = $model->getIdDokter()->one()) {
			            return Html::a($rel->nama_dokter, ['dokter/view', 'id_dokter' => $rel->id_dokter,], ['data-pjax' => 0]);
			        } else {
			            return '';
			        }
			    },
			    'format' => 'raw',
			],
			// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
			[
			    'class' => yii\grid\DataColumn::className(),
			    'attribute' => 'diagnosa',
			    'value' => function ($model) {
			        if ($rel = $model->getDiagnosa0()->one()) {
			            return Html::a($rel->nama_penyakit, ['daftar-penyakit/view', 'id' => $rel->id,], ['data-pjax' => 0]);
			        } else {
			            return '';
			        }
			    },
			    'format' => 'raw',
			],
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'keluhan_utama',
                'label' => 'Keluhan',
                'format' => 'raw',
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'riwayat_kesehatan_keluarga',
                'label' => 'Riwayat Kesehatan Keluarga',
                'format' => 'raw',
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'larangan',
                'label' => 'Pantangan / Larangan',
                'format' => 'raw',
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'perawatan',
                'label' => 'Rekomendasi Perawatan',
                'format' => 'raw',
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'note',
                'label' => 'Note',
                'format' => 'raw',
            ],

			/*'riwayat_kesehatan_keluarga:ntext',*/
			/*'keluhan_utama:ntext',*/
			/*'larangan:ntext',*/
			/*'note:ntext',*/
			
        ],
        ]); ?>
    </div>
</div>
</div>

</div>


<?php \yii\widgets\Pjax::end() ?>


