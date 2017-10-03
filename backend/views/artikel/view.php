<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Artikel $model
*/
$copyParams = $model->attributes;

$this->title =  'Artikel';
$this->params['breadcrumbs'][] = ['label' =>  'Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id_artikel, 'url' => ['view', 'id_artikel' => $model->id_artikel]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud artikel-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        'Artikel'
        <small>
            <?= $model->id_artikel ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
            '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
            [ 'update', 'id_artikel' => $model->id_artikel],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
            ['create', 'id_artikel' => $model->id_artikel, 'Artikel'=>$copyParams],
            ['class' => 'btn btn-success']) ?>

            <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
            ['create'],
            ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
            . 'Full list', ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr />

    <?php $this->beginBlock('app\models\Artikel'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'judul:ntext',
        'deskripsi:ntext',
        'abstrak:ntext',
        'image',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id_artikel' => $model->id_artikel],
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
                     'items' => [
 [
    'label'   => '<b class=""># '.$model->id_artikel.'</b>',
    'content' => $this->blocks['app\models\Artikel'],
    'active'  => true,
],
 ]
                 ]
    );
    ?>
</div>
