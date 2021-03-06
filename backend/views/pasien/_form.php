<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/**
* @var yii\web\View $this
* @var app\models\Pasien $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Pasien',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            
   <?= $form->field($model, 'nik') ?>
                    <?= $form->field($model, 'nama_pasien') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'alamat') ?>
                    <?= $form->field($model, 'no_telp_pasien') ?>
                    <?=  $form->field($model, 'gol_darah')->dropDownList(['O' => 'O', 
                                                                          'A' => 'A',
                                                                        'AB' => 'AB',
                                                                        'B' => 'B'],
                                                                        ['prompt'=>'Golongan Darah']);
                    ?>
                     <?=  $form->field($model, 'jenis_kelamin')->dropDownList(['PRIA' => 'PRIA', 
                                                                          'WANITA' => 'WANITA'],
                                                                        ['prompt'=>'Jenis Kelamin']);
                    ?>
                  
                    <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
                     $form->field($model, 'id_kota')->widget(\kartik\select2\Select2::className(), [
                        'data' => ArrayHelper::map(common\models\Kabupaten::find()->all(), 'id_kab', 'nama'),
                        'options' => [
                            'prompt' => 'Pilih Kota',
                        ],
                     ])->label('Kota Tempat Tinggal'); ?>

                     <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
                     $form->field($model, 'id_provinsi')->widget(\kartik\select2\Select2::className(), [
                        'data' => ArrayHelper::map(common\models\Provinsi::find()->all(), 'id_prov', 'nama'),
                        'options' => [
                            'prompt' => 'Pilih Provinsi',
                        ],
                     ])->label('Provinsi Tinggal'); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   =>  'Pasien',
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

