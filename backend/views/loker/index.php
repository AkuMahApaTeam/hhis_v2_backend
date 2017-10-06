<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\EventSearch $searchModel
 */

$this->title = 'Lowongan Kerja';
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
<div class="giiant-crud loker-index">

    <?php //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>
    <div class="pull-right">
    </div>
</div><br clear="all"><br>

<div class="clearfix"></div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data <?= Yii::t('app', 'Loker') ?></h3>
    </div>

    <div class="box-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'                ],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $actionColumnTemplateString,
                        'urlCreator' => function($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                            return Url::toRoute($params);
                        },
                        'contentOptions' => ['nowrap'=>'nowrap']
                    ],
                    'judul',
                    'tanggal',
                    'jenis_karyawan',
                    'email',
                    [
                        'attribute'=>'id_mahasiswa',
                        'value'=>function($data){
                            return \app\models\Mahasiswa::findOne($data->id_mahasiswa)->nama_lengkap;
                        }
                    ],
                    [
                        'label'=>'Aksi',
                        'format'=>"raw",
                        'value'=>function($data){
                            if($data->flag==0){
                                return $b = Html::a("<i class=\"fa fa-trash\"></i>",['hidden','id'=>$data->id],[
                                    "class"=>"btn btn-sm btn-danger",
                                    "data-toggle"=>"tooltip",
                                    "data-placement"=>"bottom",
                                    "title"=>"Hide",
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