<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;

/**
* @var yii\web\View $this
* @var app\models\Riwayat $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="riwayat-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Riwayat',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
          
             <!-- attribute tgl_periksa -->
            <?= $form->field($model, 'tgl_periksa')->textInput(['readonly'=>true,   'value'=>date('Y-m-d')]) ?>

<!-- attribute umur -->
            <?= $form->field($model, 'umur')->textInput() ?>

<!-- attribute berat_badan -->
            <?= $form->field($model, 'berat_badan')->textInput()->label('Berat Badan (Kg)') ?>

<!-- attribute tinggi_badan -->
            <?= $form->field($model, 'tinggi_badan')->textInput()->label('Tinggi Badan (Cm)') ?>
            <!-- attribute riwayat_kesehatan_keluarga -->
            <?= $form->field($model, 'riwayat_kesehatan_keluarga')->textarea(['rows' => 6]) ?>

<!-- attribute keluhan_utama -->
            <?= $form->field($model, 'keluhan_utama')->textarea(['rows' => 6]) ?>

 <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
            $form->field($model, 'diagnosa')->widget(\kartik\select2\Select2::className(), [
                'data' => ArrayHelper::map(app\models\DaftarPenyakit::find()->all(), 'id', 'nama_penyakit'),
                'disabled' => \Yii::$app->user->identity->role == 6 ? true : false,
                'options' => [
                    'prompt' => 'Pilih Jenis Penyakit',
                ],
            ])->label('Diagnosa'); ?>

<!-- attribute perawatan -->
			<?= $form->field($model, 'perawatan')->textInput(['maxlength' => true])->label('Rekomendasi Perawatan') ?>

<!-- attribute larangan -->
			<?= $form->field($model, 'larangan')->textarea(['rows' => 6])->label('Larangan/Pantangan') ?>

<!-- attribute note -->
			<?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


              <?= $form->field($model, 'id_pasien')->hiddenInput(['value'=>$modelPasien->id_pasien])->label(false) ?>
            <?= $form->field($model, 'id_dokter')->hiddenInput(['value'=>$modelDokter->id_dokter])->label(false) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   =>  'Riwayat',
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

