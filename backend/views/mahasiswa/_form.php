<?php

use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Mahasiswa $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Mahasiswa',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
            'options' => ['enctype' => 'multipart/form-data'],
        ]
    );
    ?>

    <?php
    $id_user = Yii::$app->user->id;
    $user = User::findOne($id_user);

    if($user->role==2){
        $fakultas = \app\models\Fakultas::find()->all();
        $jurusan = \app\models\Jurusan::find()->all();
    } elseif($user->role==4) {
        $fakultas = \app\models\Fakultas::find()->where(['id'=>$user->fakultas])->all();
        $jurusan = \app\models\Jurusan::find()->where(['fakultas'=>$user->fakultas])->all();
    } else if($user->role==5){
        $fakultas = \app\models\Fakultas::find()->where(['id'=>$user->fakultas])->all();
        $jurusan = \app\models\Jurusan::find()->where(['id'=>$user->jurusan])->all();
    }
    ?>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Form</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'nimrn')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'tanggal_lahir')->widget(kartik\date\DatePicker::className()) ?>
                    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'username')->textInput() ?>
                    <?= $form->field($model, 'email')->textInput() ?>
                    <?= $form->field($model, 'password_hash')->passwordInput() ?>
                    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6">

                    <?= $form->field($model, 'tahun_masuk')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'fakultas')->widget(\kartik\select2\Select2::className(),[
                        'data'=>\yii\helpers\ArrayHelper::map($fakultas, 'id', 'nama_fakultas'),
                        'options'=>['prompt' => 'Pilih Fakultas']
                    ]); ?>
                    <?= $form->field($model, 'jurusan')->widget(\kartik\select2\Select2::className(),[
                        'data'=>\yii\helpers\ArrayHelper::map($jurusan, 'id', 'nama_jurusan'),
                        'options'=>['prompt' => 'Pilih Jurusan']
                    ]); ?>

                    <div style="display: none">
                        <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>
                    </div>

                    <?= $form->field($model, 'foto')->widget(kartik\file\FileInput::className()) ?>
                </div>
            </div>



            <div class="col-sm-3"></div>
            <div class="col-md-6">
                <?php
                if(!$model->isNewRecord){
                    echo Html::img("../uploads/mahasiswa/foto/".$model->foto,['class'=>'img img-bordered','width'=>'150','height'=>'auto']);
                }
                ?>
            </div>
            <br clear="all">

            <h4 class="text-center">Pilih lokasi pekerjaan</h4>
            <div id="map" class="col-md-12" style="height: 450px">
                haha
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmPFHFLM57QXkvvEAs6LSKD1q7mmlvf5o&callback=initMap" async defer></script>
<script src="<?= Yii::$app->request->baseUrl . "/js/maphandler.js"; ?>"></script>
<script>
    function initMap() {

        var mapProp = {
            center: new google.maps.LatLng(-7.250445, 112.768845),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), mapProp);
        // Create a map object and specify the DOM element for display.

        var mapHandler = new MapHandler(map);
        <?php if(!$model->isNewRecord){?>
        var point = {
            lat: Number($('#mahasiswa-lat').val()),
            lng: Number($('#mahasiswa-lng').val())
        };
        console.log(point);

        mapHandler.addMarker(point);
        map.panTo(new google.maps.LatLng(point.lat, point.lng));
        <?php } ?>
        map.addListener('click', function (e) {
            //alert("hallo" + e.latLng.lat()) ;
            var point = {
                lat: e.latLng.lat(),
                lng: e.latLng.lng()
            };

            mapHandler.addMarker(point);
            mapHandler.setLat("#mahasiswa-lat", point);
            mapHandler.setLng("#mahasiswa-lng", point);
            mapHandler.getAddress("#pekerjaan-lokasi", point);

        });

    }

</script>

