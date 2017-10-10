<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\Event $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Event'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->judul, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud event-view">

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
            <?php $this->beginBlock('app\models\Event'); ?>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'id',
                    'judul',
                    [
                        'label'=>'isi',
                        'format'=>'raw',
                        'value'=>$model->isi,
                    ],

                    'tanggal',
//                    'lokasi',
//                    [
//                        'attribute'=>'fakultas',
//                        'value'=>call_user_func(function ($data){
//                            if($data->fakultas==null){
//                                return "Semua Fakultas";
//                            }
//                            return \app\models\Fakultas::findOne($data->fakultas)->nama_fakultas;
//                        },$model),
//                    ],
//                    [
//                        'attribute'=>'jurusan',
//                        'value'=>call_user_func(function ($data){
//                            if($data->jurusan==null){
//                                return "Semua Jurusan";
//                            }
//                            return \app\models\Jurusan::findOne($data->jurusan)->nama_jurusan;
//                        },$model),
//                    ],

                    [
                        'format' => 'html',
                        'attribute' => 'foto',
                        'value' =>
                            '<img width="150px" height="150px" src="'.Yii::$app->urlManagerFotoEvent->baseUrl."/".$model->gambar.'">'

                    ],
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



            <?= Tabs::widget(
                [
                    'id' => 'relation-tabs',
                    'encodeLabels' => false,
                    'items' => [[
                        'label' => '<b class=""># ' . $model->id . '</b>',
                        'content' => $this->blocks['app\models\Event'],
                        'active' => true,
                    ],]
                ]
            );
            ?>        </div>

    </div>


</div>
