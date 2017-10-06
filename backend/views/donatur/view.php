<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\Donatur $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Donatur');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donaturs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud donatur-view">

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
            <?php $this->beginBlock('app\models\Donatur'); ?>


            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'label' => 'Donatur',
                        'value' => \app\models\Mahasiswa::findOne($model->donatur)->nama_lengkap,
                    ],
                    'jenis_donatur',
                    'jumlah',
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

            <?php $this->beginBlock('donasi'); ?>

            <?php
                $bulan = ['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'];
            ?>
            <table class="table table-responsive table-striped">

                <tr>
                    <?php
                        foreach ($bulan as $month){
                            echo "<th>$month</th>";
                        }
                    ?>
                </tr>
                <tr>
                    <?php
                    foreach ($bulan as $month){

                        $donasi = \app\models\base\DonasiRutin::find()->where([
                            'id_mahasiswa'=>$model->donatur,
                            'bulan'=>$month,
                            'tahun'=>date('Y'),
                        ])->count();

                        if($donasi==0){
                            echo "<td>".Html::a("<i class='fa fa-check'></i>",['donatur/pay','id'=>$model->id,'bln'=>$month],['class'=>'btn btn-default btn-sm'])."</td>";
                        } else {
                            echo "<td>".Html::a("<i class='fa fa-check'></i>",['donatur/pay','id'=>$model->id,'bln'=>$month],['class'=>'btn btn-sm disabled'])."</td>";

                        }

                    }
                    ?>
                </tr>
            </table>
            <?php $this->endBlock() ?>

            <?= Tabs::widget(
                [
                    'id' => 'relation-tabs',
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => '<b class=""># ' . $model->id . '</b>',
                            'content' => $this->blocks['app\models\Donatur'],
                            'active' => true,
                        ],
                        [
                            'label' => '<b class="">Donasi</b>',
                            'content' => $this->blocks['donasi'],

                        ],
                    ]
                ]
            );
            ?>
        </div>

    </div>


</div>
