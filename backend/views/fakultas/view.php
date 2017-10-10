<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\Fakultas $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Fakultas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud fakultas-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>
    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
                '<span class="fa fa-pencil"></span> ' . 'Edit',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-info']) ?>

            <?= Html::a(
                '<span class="fa fa-plus"></span> ' . 'New',
                ['create'],
                ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="fa fa-list"></span> '
                . 'Full list', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

    </div>
    <br clear="all">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Detail </h3>
        </div>

        <div class="box-body">
            <?php $this->beginBlock('app\models\Fakultas'); ?>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'nama_fakultas',
                ],
            ]); ?>


            <hr/>

            <?= Html::a('<span class="fa fa-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
                    'data-method' => 'post',
                ]); ?>
            <?php $this->endBlock(); ?>



            <?php $this->beginBlock('Jurusans'); ?>
            <div style='position: relative'>
                <div style='position:absolute; right: 0px; top: 0px;'>
                    <?= Html::a(
                        '<span class="fa fa-list"></span> ' . 'List All' . ' Jurusans',
                        ['jurusan/index'],
                        ['class' => 'btn text-muted btn-xs']
                    ) ?>
                    <?= Html::a(
                        '<span class="fa fa-plus"></span> ' . 'New' . ' Jurusan',
                        ['jurusan/create', 'Jurusan' => ['fakultas' => $model->id]],
                        ['class' => 'btn btn-success btn-xs']
                    ); ?>
                </div>
            </div><?php Pjax::begin(['id' => 'pjax-Jurusans', 'enableReplaceState' => false, 'linkSelector' => '#pjax-Jurusans ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">' . \yii\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getJurusans(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-jurusans']]),
                'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'
                ],
                'columns' => [[
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'contentOptions' => ['nowrap' => 'nowrap'],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                        $params[0] = 'jurusan' . '/' . $action;
                        return $params;
                    },
                    'buttons' => [

                    ],
                    'controller' => 'jurusan'
                ],
                    'id',
                    'nama_jurusan',
                ]
            ]) . '</div>' ?>
            <?php Pjax::end() ?>
            <?php $this->endBlock() ?>


            <?php $this->beginBlock('Mahasiswas'); ?>
            <div style='position: relative'>
                <div style='position:absolute; right: 0px; top: 0px;'>
                    <?= Html::a(
                        '<span class="fa fa-list"></span> ' . 'List All' . ' Mahasiswas',
                        ['mahasiswa/index'],
                        ['class' => 'btn text-muted btn-xs']
                    ) ?>
                    <?= Html::a(
                        '<span class="fa fa-plus"></span> ' . 'New' . ' Mahasiswa',
                        ['mahasiswa/create', 'Mahasiswa' => ['fakultas' => $model->id]],
                        ['class' => 'btn btn-success btn-xs']
                    ); ?>
                </div>
            </div><?php Pjax::begin(['id' => 'pjax-Mahasiswas', 'enableReplaceState' => false, 'linkSelector' => '#pjax-Mahasiswas ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">' . \yii\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getMahasiswas(), 'pagination' => ['pageSize' => 20, 'pageParam' => 'page-mahasiswas']]),
                'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'
                ],
                'columns' => [[
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'contentOptions' => ['nowrap' => 'nowrap'],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                        $params[0] = 'mahasiswa' . '/' . $action;
                        return $params;
                    },
                    'buttons' => [

                    ],
                    'controller' => 'mahasiswa'
                ],
                    'id',
                    'nama_lengkap',
                    'nimrn',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'alamat',
                    'tahun_masuk',
                    'status',
                    [
                        'attribute'=>'foto',
                        'format'=>'raw',
                        'value'=>function($data){
                            return Html::img(Yii::getAlias('@web')."/uploads/mahasiswa/foto/".$data->foto,['width'=>'150px','height'=>'auto']);
                        }
                    ],
                ]
            ]) . '</div>' ?>
            <?php Pjax::end() ?>
            <?php $this->endBlock() ?>


            <?= Tabs::widget(
                [
                    'id' => 'relation-tabs',
                    'encodeLabels' => false,
                    'items' => [[
                        'label' => '<b class=""># ' . $model->id . '</b>',
                        'content' => $this->blocks['app\models\Fakultas'],
                        'active' => true,
                    ], [
                        'content' => $this->blocks['Jurusans'],
                        'label' => '<small>Jurusan <span class="badge badge-default">' . count($model->getJurusans()->asArray()->all()) . '</span></small>',
                        'active' => false,
                    ], [
                        'content' => $this->blocks['Mahasiswas'],
                        'label' => '<small>Mahasiswa <span class="badge badge-default">' . count($model->getMahasiswas()->asArray()->all()) . '</span></small>',
                        'active' => false,
                    ],]
                ]
            );
            ?>        </div>

    </div>


</div>
