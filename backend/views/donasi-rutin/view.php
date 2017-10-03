<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\DonasiRutin $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'DonasiRutin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'DonasiRutins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud donasi-rutin-view">

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
            <?php $this->beginBlock('app\models\DonasiRutin'); ?>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'label' => 'Donatur',
                        'value' => \app\models\Mahasiswa::findOne($model->id_mahasiswa)->nama_lengkap,
                    ],
                    [
                        'label' => 'Jumlah Donasi',
                        'format'=>'raw',
                        'value' => "<b>Rp.".number_format($model->jumlah,0,"",".")."</b>",
                    ],
                    'bulan',
                    'tahun',
                    'tanggal',
                    [
                        'attribute'=>'valid',
                        'format'=>'raw',
                        'value'=>call_user_func(function($data){
                            if($data->valid == 0){
                                return "<span class=\"label bg-red\">Belum Valid</span>";
                            }
                            return "<span class=\"label bg-green\">Valid</span>";

                        },$model),
                    ],
                    'tgl_valid',
                    [
                        'label'=>'',
                        'format'=>"raw",
                        'value'=>call_user_func(function($data){
                            if($data->valid==0){
                                return $b = Html::a("<i class=\"fa fa-check\"></i>",['approve','id'=>$data->id],[
                                    "class"=>"btn btn-sm btn-primary",
                                    'data-toggle'=>"tooltip",
                                    "data-placement"=>"bottom",
                                    "title"=>"Approve",
                                ]);
                            }

                            return "";

                        },$model),
                    ]
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
                        'content' => $this->blocks['app\models\DonasiRutin'],
                        'active' => true,
                    ],]
                ]
            );
            ?>        </div>

    </div>


</div>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
