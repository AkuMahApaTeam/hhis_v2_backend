<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var backend\models\Loker $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="loker-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Loker',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>


            <!-- attribute judul -->
            <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

            <!-- attribute nama_kantor -->
            <?= $form->field($model, 'nama_kantor')->textInput(['maxlength' => true]) ?>

            <!-- attribute isi -->
            <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

            <!-- attribute tanggal -->
            <?= $form->field($model, 'tanggal')->textInput() ?>

            <!-- attribute lokasi -->
            <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>

            <!-- attribute jenis_karyawan -->
            <?= $form->field($model, 'jenis_karyawan')->textInput(['maxlength' => true]) ?>

            <!-- attribute email -->
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <!-- attribute kontak -->
            <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

            <!-- attribute url -->
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <!-- attribute id_mahasiswa -->
            <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
            $form->field($model, 'id_mahasiswa')->dropDownList(
                \yii\helpers\ArrayHelper::map(app\models\Mahasiswa::find()->all(), 'id', 'id'),
                [
                    'prompt' => 'Select',
                    'disabled' => (isset($relAttributes) && isset($relAttributes['id_mahasiswa'])),
                ]
            ); ?>

            <!-- attribute flag -->
            <?= $form->field($model, 'flag')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>

        <?=
        Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => Yii::t('app', 'Loker'),
                        'content' => $this->blocks['main'],
                        'active' => true,
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

