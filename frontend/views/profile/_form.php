<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use frontend\models\Jurusan;
use dmstr\bootstrap\Tabs;

?>
<?php
$arr2 = [];
for ($i = date('Y'); $i >= 1970; $i--)
    $arr2[] = [
        'id' => $i,
        'name' => $i
    ];
$thn = \yii\helpers\ArrayHelper::map($arr2, 'id', 'name');
?>
<?php $form = ActiveForm::begin([
        'id' => 'profile',
        'method' => 'post',
        'action' => ['profile/update'],
        'layout' => 'horizontal',
        'enableClientValidation' => false,
        'errorSummaryCssClass' => 'error-summary alert alert-error',
        'options' => ['enctype' => 'multipart/form-data'],
    ]
);
?>

<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <center><h3 class="box-title">Edit My Profile</h3></center>
                </div>
                <div class="box-body box-profile">
                    <center>
                        <img src="<?= Yii::$app->request->baseUrl.'/uploads/mhs/'.$model->foto ?>" width="150px">
                    </center>
                    <h3 class="profile-username text-center"><?php echo "" ?></h3>

                    <p class="text-muted text-center"><?= ""; ?></p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nama</b> <a class="pull-right"><?= Yii::$app->user->identity->nama_lengkap ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Pekerjaan</b> <a class="pull-right"><?= Yii::$app->user->identity->pekerjaan ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>E-Mail</b> <a class="pull-right"><?= Yii::$app->user->identity->email ?></a>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-md-9">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
            </div>
            <div class="box box-primary">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2><?= $model->nama_lengkap ?></h2>
                    </div>

                    <div class="panel-body">

                        <div class="user-form">

                            <div class="">
                                <?php $this->beginBlock('main'); ?>

                                <p>
                                    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'email')->widget(\yii\widgets\MaskedInput::className(), [
                                        'name' => 'input-36',
                                        'clientOptions' => [
                                            'alias' => 'email'
                                        ]
                                    ]) ?>
                                    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                                    <?= $form->field($model, 'tanggal_lahir')->widget(\kartik\date\DatePicker::className(), [
                                        'name' => 'tanggal_lahir',
                                        'value' => date('d-M-Y'),
                                        'options' => ['placeholder' => 'Pillih Tanggal...'],
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'todayHighlight' => true
                                        ]]) ?>
                                    <?= $form->field($model, 'alamat')->textInput() ?>

                                <div class="form-group field-mahasiswa-alamat" style="padding-bottom: 310px">
                                    <label class="control-label col-sm-3" for="mahasiswa-alamat"></label>

                                    <div class="col-sm-6">
                                        <div id="maps"
                                            <?php
                                            if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
                                                ?>
                                                style="position: absolute;overflow: hidden;width: 90%;height: 300px;"
                                                <?php
                                            } else { // desktop browser
                                                ?>
                                                style="position: absolute;overflow: hidden;width: 390px;height: 340px;"
                                                <?php
                                            }
                                            ?>></div>
                                    </div>
                                </div>
                                <?= $form->field($model, 'lng')->hiddenInput()->label(false) ?>
                                <?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>
                                <?= $form->field($model, 'kota')->hiddenInput()->label(false) ?>
                                <?= $form->field($model, 'provinsi')->hiddenInput()->label(false) ?>
                                <?= $form->field($model, 'negara')->hiddenInput()->label(false) ?>
                                <?= $form->field($model, 'tahun_masuk')->widget(Select2::classname(), [
                                    'data' => $thn,
                                    'language' => 'de',
                                    'options' => ['placeholder' => 'Pilih Tahun Masuk...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],]) ?>
                                <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
                                <?= $form->field($model, 'jurusan')->widget(Select2::classname(), [
                                    'data' => \yii\helpers\ArrayHelper::map(Jurusan::find()->all(), 'id', 'nama_jurusan'),
                                    'language' => 'de',
                                    'options' => ['placeholder' => 'Pilih Jurusan ...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],]) ?>
                                <?= $form->field($model, 'deskripsi')->textarea() ?>
                                <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'autocomplete' => "off"]) ?>
                                <?= $form->field($model, 'foto')->widget(\kartik\file\FileInput::className(), [
                                    'options' => ['accept' => 'image/*'],
                                    'pluginOptions' => [
                                        'allowedFileExtensions' => ['jpg', 'png', 'jpeg', 'bmp'],
                                        'maxFileSize' => 500,
                                    ],
                                ]) ?>
                                <?php
                                if ($model->foto != null) {
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <img src="<?= Yii::$app->request->baseUrl.'/uploads/mhs/'.$model->foto ?>" width="150px">
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                </p>
                                <?php $this->endBlock(); ?>

                                <?=
                                Tabs::widget(
                                    [
                                        'encodeLabels' => false,
                                        'items' => [[
                                            'label' => 'My Profile',
                                            'content' => $this->blocks['main'],
                                            'active' => true,
                                        ],]
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

                    </div>

                </div>

            </div>
        </div>
    </div>
    <style>
        .tt-dropdown-menu,
        .gist {
            text-align: left;
        }

        .typeahead,
        .tt-query,
        .tt-hint {
            width: 480px;
            height: 30px;
            padding: 8px 12px;
            font-size: 24px;
            line-height: 30px;
            border: 2px solid #ccc;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
            outline: none;
        }

        .typeahead {
            background-color: #fff;
        }

        .typeahead:focus {
            border: 2px solid #0097cf;
        }

        .typeahead.empty {
            border: 2px solid red;
        }

        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
            color: #999;
            width: 430px;
        }

        .tt-dropdown-menu {
            width: 422px;
            margin-top: 1px;
            padding: 2px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            padding-top: 1px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        }

        .tt-suggestion {
            padding: 3px 20px;
            font-size: 18px;
            line-height: 24px;
        }

        .tt-suggestion.tt-cursor {
            color: #fff;
            background-color: #0097cf;

        }

        .tt-suggestion p {
            margin: 0;
        }

        .gist {
            font-size: 14px;
        }

        .typeahead {
            width: 405px;
        }

        pre.response {
            float: left;
            width: 430px;
            height: 400px;
            border: 1px solid #DDD;
            font-size: 12px;
            overflow: scroll;
        }

        .twitter-typeahead {
            position: relative;
            display: inline-block;
            direction: ltr;
            width: 100%;
        }

        img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            border: 1px;
            border-radius: 80px;
        }
    </style>