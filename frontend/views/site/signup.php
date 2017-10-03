<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row" <?php
    if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
        ?>
        style="padding-left: 20px;padding-right: 20px;padding-top: 59px;"
        <?php
    } else { // desktop browser
        ?>

        <?php
    }
    ?>
    >
        <div class="col-md-16 col-md-offset-3">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to signup:</p>

            <div class="row">
                <div class="col-lg-8">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'nimrn')  ?>

                    <?= $form->field($model, 'nama_lengkap')  ?>
                    <?= $form->field($model, 'fakultas')->widget(Select2::className(),[
                        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Fakultas::find()->all(),'id','nama_fakultas'),
                        'language' => 'de',
                        'options' => ['placeholder' => 'Pilih Fakultas ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])  ?>
                    <?= $form->field($model, 'jurusan')->widget(Select2::className(),[
                        'data' => \yii\helpers\ArrayHelper::map(\frontend\models\Jurusan::find()->all(), 'id', 'nama_jurusan'),
                        'language' => 'de',
                        'options' => ['placeholder' => 'Pilih Jurusan ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])  ?>
                    <?= $form->field($model, 'tahun_masuk')  ?>
                    <?= $form->field($model, 'reCaptcha')->widget(
                        \himiklab\yii2\recaptcha\ReCaptcha::className(),
                        ['siteKey' => '6Lcc-hYUAAAAAIMKvGFTwi5fSXjEGhfL4GfcYpWV']
                    ) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
