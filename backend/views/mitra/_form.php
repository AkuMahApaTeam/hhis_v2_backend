<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
* @var yii\web\View $this
* @var app\models\MasterMitra $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="master-mitra-form">

    <?php $form = ActiveForm::begin([
    'id' => 'MasterMitra',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            



<!-- attribute nama -->
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

<!-- attribute email -->
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!-- attribute id_kategori -->
            <?= $form->field($model, 'id_kategori')->widget(\kartik\select2\Select2::className(),[
                'data'=>ArrayHelper::map(app\models\MasterKategoriMitra::find()->all(),'id','nama'),
                'options'=>[
                    'prompt'=>'Pilih Kategori'
                ],
            ])->label('Kategori');  ?>

<!-- attribute status_spk -->


<!-- attribute id_provinsi -->
            <?= $form->field($model, 'id_provinsi')->widget(\kartik\select2\Select2::className(),[
                'data'=>ArrayHelper::map(app\models\Provinsi::find()->asArray()->all(),'id_prov','nama'),
                'options'=>[
                    'prompt'=>'Pilih Provinsi',
                    // 'onchange' =>'$.post("'.Yii::$app->urlManager->createUrl('kontrak/lists?id=').'"+$(this).val(),function(data){
                    //     $( "#id_kontrak" ).html( data );
                    // }   )'

                    'onchange'=>'
                        $.get( "'.Url::toRoute('/mitra/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'id_kota').'" ).html( data );
                            }
                        );
                    '
                ],
             ])->label('Provinsi'); ?>
<!-- attribute id_kota -->
            <?= 
$form->field($model, 'id_kota')->dropDownList(
    [
        'prompt' => 'Pilih Kota'        
    ])->label('Nama Kota'); 
?>



<!-- attribute alamat -->
			<?= $form->field($model, 'alamat')->textArea(['maxlength' => true]) ?>

<!-- attribute kontak -->
			<?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'status_spk')->radioList([
    'iya' => 'Iya', 
    'tidak' => 'Tidak'
]) ?>

<!-- attribute id_user -->
			<?= $form->field($model, 'id_user')->hiddenInput(['value'=>'1'])->label(false) ?>


        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => 'MasterMitra',
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

