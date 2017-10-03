<?php

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\DonasiEvent $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="donasi-event-form">

    <?php $form = ActiveForm::begin([
    'id' => 'DonasiEvent',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error',
    'options'=>['enctype'=>'multipart/form-data'],
    ]
    );
    ?>

    <?php
    $id_user = Yii::$app->user->id;
    $user = User::findOne($id_user);

    if($user->role==2){
        $event = \app\models\Event::find()->orderBy("id",SORT_DESC)->all();
        $mahasiswa = \app\models\Mahasiswa::find()->all();
    } elseif($user->role==4) {
        $event = \app\models\Event::find()->where(['fakultas'=>$user->fakultas])->all();
        $mahasiswa = \app\models\Mahasiswa::find()->where(['fakultas'=>$user->fakultas])->all();
    } else if($user->role==5){
        $event = \app\models\Event::find()->where(['fakultas'=>$user->fakultas,'jurusan'=>$user->jurusan])->all();
        $mahasiswa = \app\models\Mahasiswa::find()->where(['fakultas'=>$user->fakultas,'jurusan'=>$user->jurusan])->all();
    }
    ?>
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-header with-border">
                <h3 class="box-title">Form</h3><?=$user->fakultas.$user->jurusan?>
        </div>

        <div class="box-body">
			<?= $form->field($model, 'event')->widget(\kartik\select2\Select2::className(),[
			    'data'=>\yii\helpers\ArrayHelper::map($event,'id','judul'),
                'options'=>['prompt'=>'Pilih Event'],


            ]) ?>
            <?= $form->field($model, 'donatur')->widget(\kartik\select2\Select2::className(),[
                'data'=>\yii\helpers\ArrayHelper::map($mahasiswa,'id','nama_lengkap'),
                'options'=>['prompt'=>'Pilih Donatur'],
            ]) ?>
			<?= $form->field($model, 'jumlah')->textInput() ?>
            <div style="display: none ">
                <?= $form->field($model, 'tanggal')->textInput(['maxlength' => true,'value'=>date("d-M-Y")]) ?>
            </div>

        </div>

        <div class="box-footer">
            <?php echo $form->errorSummary($model); ?>

            <?= Html::submitButton(
            '<span class="fa fa-check"></span> ' .
            ($model->isNewRecord ? 'Create' : 'Save'),
            [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
            ]
            );
            ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>

