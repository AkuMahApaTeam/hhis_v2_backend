<?php

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\Donasi $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="donasi-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Donasi',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error',
    'options'=>['enctype'=>'multipart/form-data'],
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

        if($user->role==2){
            $mahasiswa = \app\models\Mahasiswa::find()->all();
        } elseif($user->role==4) {
            $mahasiswa = \app\models\Mahasiswa::find()->where(['fakultas'=>$user->fakultas])->all();
        } else if($user->role==5){
            $mahasiswa = \app\models\Mahasiswa::find()->where(['fakultas'=>$user->fakultas,'jurusan'=>$user->jurusan])->all();
        }
        ?>

        <div class="box-body">
            <?= $form->field($model, 'id_mahasiswa')->widget(\kartik\select2\Select2::className(),[
                'data'=>\yii\helpers\ArrayHelper::map($mahasiswa,'id','nama_lengkap'),
                'options'=>['prompt'=>'Pilih Mahasiswa'],
            ]) ?>
			<?= $form->field($model, 'jumlah')->textInput() ?>
			<?= $form->field($model, 'tgl_donasi')->textInput(['value'=>date("d-M-Y"),'readonly'=>true]) ?>
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

