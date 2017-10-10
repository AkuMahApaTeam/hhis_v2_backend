<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\editable\Editable;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\Skenario1Search $searchModel
 */

$this->title = 'Beasiswa Mitra';
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">' . $actionColumnTemplateString . '</div>';

$script = "
function renderTables () {
    $.get('".Url::to(['skenario1/render-summary'])."', {
        'id':$('#id_tahun_ajar').val(),
    }, 
    function(data){
        $('#summary-skenario1').html(data);
    })
    
    $.get('".Url::to(['skenario1/render-skenario'])."', {
        'id':$('#id_tahun_ajar').val(),
    }, 
    function(data){
        $('#data-skenario1').html(data);
    })
}

$('#id_tahun_ajar').change(function(){
    if($('#id_tahun_ajar').val() != '') {
        renderTables();
    } else {
        $('#data-skenario1').html($('#hidden').html());
        $('#summary-skenario1').empty();
    }
});

$(document).ready(function(){
    if($('#id_tahun_ajar').val() != '') {
        renderTables();
    } else {
        $('#data-skenario1').html($('#hidden').html());
        $('#summary-skenario1').empty();
    }
});
";
$this->registerJs($script);
?>

<div class="giiant-crud skenario1-index">

    <?php
    //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <div class="clearfix crud-navigation">

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
                                'url' => ['mitra/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Master Mitra',
                            ],
                            [
                                'url' => ['tahun-ajar/index'],
                                'label' => '<i class="glyphicon glyphicon-arrow-left"></i> ' . 'Master Tahun Ajar',
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


        <div class="box-body" id="grid-container">

            <?php if(\Yii::$app->user->identity->role == 2): ?>
                <?php
                echo \kartik\widgets\Select2::widget([
                    'name' => 'id_tahun_ajar',
                    'data' => \yii\helpers\ArrayHelper::map(app\models\MasterTahunAjar::find()->orderBy('awal')->all(), 'id', function ($model, $defaultValue) {
                        $formatter = Yii::$app->formatter;
                        return $formatter->asDate($model['awal']) . ' ' . '/' . ' ' . $formatter->asDate($model['akhir']);
                    }),
                    'value' => isset($tahunAjar) ? $tahunAjar->id : null,
                    'options' => [
                        'placeholder' => 'Pilih Tahun Ajar',
                        'id' => 'id_tahun_ajar',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <br/>

                <div class="table-responsive" id="summary-skenario1">



                </div>

                <br/>

                <div class="table-responsive" id="data-skenario1">

                    <div class="callout callout-info">
                        <h4><i class="icon fa fa-warning"></i> Pilih Tahun Ajaran terlebih dahulu.</h4>
                    </div>

                </div>

                <div class="hidden" id="hidden">
                    <div class='callout callout-info'>
                        <h4><i class='icon fa fa-warning'></i> Pilih Tahun Ajaran terlebih dahulu.</h4>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(\Yii::$app->user->identity->role == 6): ?>
                <?=
                $this->render('_dataSkenario2', [
                    'dataProvider' => $dataProvider,
                ]);
                ?>
            <?php endif; ?>
        </div>
    </div>


    <?php \yii\widgets\Pjax::end() ?>


