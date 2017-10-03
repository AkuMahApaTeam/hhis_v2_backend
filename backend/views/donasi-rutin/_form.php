<?php

use app\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var app\models\DonasiRutin $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="donasi-rutin-form">

    <?php $form = ActiveForm::begin([
    'id' => 'DonasiRutin',
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
            $bulan = [
                "januari"=>"Januari",
                "februari"=>"Februari",
                "maret"=>"Maret",
                "april"=>"April",
                "mei"=>"Mei",
                "juni"=>"Juni",
                "juli"=>"Juli",
                "agustus"=>"Agustus",
                "september"=>"September",
                "oktober"=>"Oktober",
                "november"=>"November",
                "desember"=>"Desember",
            ];

        //$donatur = \app\models\Donatur::find()->leftJoin('mahasiswa',"donatur.donatur = mahasiswa.id");
        ?>

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
                'options'=>['prompt'=>'Donatur'],
            ]) ?>
			<?= $form->field($model, 'jumlah')->textInput(["readonly"=>true]) ?>
			<?= $form->field($model, 'bulan')->widget(\kartik\select2\Select2::className(),[
			   'data'=>$bulan,
                'options'=>['prompt'=>'Bulan'],
            ]) ?>
			<?= $form->field($model, 'tahun')->textInput(['value'=>date('Y')]) ?>
			<?= $form->field($model, 'tanggal')->textInput(['value' => date('d-M-Y'),'readonly'=>true]) ?>
            <div style="display:none">
                <?= $form->field($model, 'valid')->textInput(['value'=>0]) ?>
                <?= $form->field($model, 'tgl_valid')->textInput(['value'=>date("d-M-Y")]) ?>
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
<script>
    $("#donasirutin-id_mahasiswa").change(function () {
        $.ajax({
            url:'<?=\yii\helpers\Url::to(['donatur/get-jumlah'])?>',
            data : {
                id:this.value
            },
            type:'GET',
            success:function (data) {
                $("#donasirutin-jumlah").val(data);
            }
        })
    })
</script>

