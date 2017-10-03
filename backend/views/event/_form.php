<?php

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Event $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="event-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Event',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
            'options' => ['enctype' => 'multipart/form-data'],
        ]
    );
    ?>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Form</h3>
        </div>
        <?php
        $id_user = Yii::$app->user->id;
        $user = User::findOne($id_user);

        if ($user->role == 2) {
            $fakultas = \app\models\Fakultas::find()->all();
            $jurusan = \app\models\Jurusan::find()->all();
        } elseif ($user->role == 4) {
            $fakultas = \app\models\Fakultas::find()->where(['id' => $user->fakultas])->all();
            $jurusan = \app\models\Jurusan::find()->where(['fakultas' => $user->fakultas])->all();
        } else if ($user->role == 5) {
            $fakultas = \app\models\Fakultas::find()->where(['id' => $user->fakultas])->all();
            $jurusan = \app\models\Jurusan::find()->where(['id' => $user->jurusan])->all();
        }
        ?>

        <div class="box-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'isi')->widget(\yii\redactor\widgets\Redactor::className()) ?>
                        <?= $form->field($model, 'gambar')->widget(\kartik\file\FileInput::className(), [
                            'options' => ['accept' => 'image/*'],
                        ]) ?>
                        <?php if ($model->gambar != null) {
                            ?>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <img src="<?= Yii::$app->urlManagerFotoEvent->baseUrl . '/' . $model->gambar ?>" width="250"
                                         height="150px">
                                </div>
                            </div>
                        <?php } ?>
                        <?= Html::input('submit', 'save', 'Publish & Send', [
                            'class' => 'btn btn-success',
                            //'style'=>'width:300px'
                        ]) ?>

                    </div>
                    <div class="col-md-4">
                        <div class="custom-select-box">
                            <?php
                            $arr2 = \frontend\models\Fakultas::find()->all();
                            $prd = \yii\helpers\ArrayHelper::map($arr2, 'id', 'nama_fakultas');
                            echo \kartik\widgets\Select2::widget([
                                'name' => 'fakultas',
                                'data' => $prd,
                                'size' => \kartik\widgets\Select2::MEDIUM,
                                //'value' => $f,
                                'options' => [
                                    'placeholder' => 'Pilih Fakultas ...',
                                    'id' => 'fakultas',
                                ],
                            ]);
                            ?>
                        </div>

                        <div class="custom-select-box">
                            <?php
                            $arr3 = \frontend\models\Jurusan::find()->all();
                            $prd3 = \yii\helpers\ArrayHelper::map($arr3, 'id', 'nama_jurusan');
                            echo \kartik\widgets\Select2::widget([
                                'name' => 'jurusan',
                                'data' => $prd3,
                                'size' => \kartik\widgets\Select2::MEDIUM,
                                //'value' => $j,
                                'options' => [
                                    'placeholder' => 'Pilih Jurusan ...',
                                    'id' => 'jurusan',

                                ],
                            ]);
                            ?>
                        </div>
                        <div class="custom-select-box">
                            <?php
                            $arr4 = [];
                            for ($i = date('Y'); $i >= 1997; $i--)
                                $arr4[] = [
                                    'id' => $i,
                                    'name' => $i
                                ];
                            $prd4 = \yii\helpers\ArrayHelper::map($arr4, 'id', 'name');
                            echo \kartik\widgets\Select2::widget([
                                'name' => 'thn_masuk',
                                'data' => $prd4,
                                'size' => \kartik\widgets\Select2::MEDIUM,
                                //'value' => $t,
                                'options' => [
                                    'placeholder' => 'Pilih Tahun Masuk ...',
                                    'id' => 'thn_masuk',
                                ],
                            ]);
                            ?>
                        </div>
                        <div class="custom-select-box">
                            <?=
                            \dosamigos\selectize\SelectizeTextInput::widget([
                                'name' => 'selected_minat',
                                'id' => 'selected_minat',
                                'loadUrl' => ['event/listm'],
                                'options' => ['class' => 'form-control','placeholder' => 'Pilih Skill'],
                                'clientOptions' => [
                                    'plugins' => ['remove_button'],
                                    'valueField' => 'id',
                                    'labelField' => 'name',
                                    'searchField' => ['name'],
                                    'create' => false,
                                ]
                            ]);
                            ?>
                        </div>
                        <div class="custom-select-box">
                            <?=
                            \dosamigos\selectize\SelectizeTextInput::widget([
                                'name' => 'selected_minat2',
                                'id' => 'selected_minat2',
                                'loadUrl' => ['event/listmnt'],
                                'options' => ['class' => 'form-control','placeholder' => 'Pilih Minat'],
                                'clientOptions' => [
                                    'plugins' => ['remove_button'],
                                    'valueField' => 'id',
                                    'labelField' => 'name',
                                    'searchField' => ['name'],
                                    'create' => false,
                                ]
                            ]);
                            ?>
                        </div>
                        <div class="sidebar-button">
                            <?= Html::input('submit', 'cari', 'Filter Alumni', [
                                'class' => 'btn btn-info btn-block',
                            ]) ?>
                            <div class="row" style="margin-top: 20px;">

                                <?= \yii\grid\GridView::widget([
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
                                            'class' => 'yii\grid\CheckboxColumn',
                                            'checkboxOptions' => function ($roleM) {
                                                return [
                                                    'value' => $roleM['id'],

                                                ];
                                            },
                                        ],

                                        'nama_lengkap',

                                    ],
                                ]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <?php echo $form->errorSummary($model); ?>

        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>

<style>
    .col-sm-6 {
        width: 70%;
    }.form-horizontal .control-label {
         padding-top: 7px;
         margin-bottom: 0;
         text-align: left;
     }
    .custom-select-box{
        padding-bottom: 5px;
    }
</style>