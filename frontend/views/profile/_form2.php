<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var app\models\Jurusan $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="mhs-pekerjaan-form">

    <?php $form = ActiveForm::begin([
            'id' => 'MhsPekerjaan',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
            'options' => ['enctype' => 'multipart/form-data'],
        ]
    );
    ?>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <?= $form->field($model, 'posisi')->textInput(); ?>
            <?= $form->field($model, 'perusahaan_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(\frontend\models\MasterPerusahaan::find()->asArray()->all(), 'id', 'nama')
            ) ?>
            <?= $form->field($model, 'lokasi')->textInput() ?>
            <div class="form-group field-mhspekerjaan-map" style="padding-bottom: 310px">
                <label class="control-label col-sm-3" for="mhspekerjaan-posisi"></label>

                <div class="col-sm-6">
                    <div id="map"
                        <?php
                        if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
                            ?>
                            style="position: absolute;overflow: hidden;width: 90%;height: 300px;"
                            <?php
                        } else { // desktop browser
                        ?>
                         style="position: absolute;overflow: hidden;width: 355px;height: 300px;"
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'long')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'ruang_lingkup')->dropDownList(
        \yii\helpers\ArrayHelper::map(\frontend\models\MasterRuangLingkup::find()->all(), 'id', 'nama')
    ); ?>
    <?= $form->field($model, 'tanggal_mulai')->widget(\kartik\widgets\DatePicker::className(), [
        'name' => 'tanggal_mulai',
        'value' => date('d-M-Y'),
        'options' => ['placeholder' => 'Pilih tanggal mulai...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>
    <?= $form->field($model, 'status')->checkbox()->label('Masih Kerja disini') ?>
    <?= $form->field($model, 'tanggal_akhir',['options' =>
    ['id' =>'akhir']
    ])->widget(\kartik\widgets\DatePicker::className(), [
        'name' => 'tanggal_akhir',
        'value' => date('d-M-Y'),
        'options' => ['placeholder' => 'Pilih tanggal selesai...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]) ?>
    </div>
<br>
<br>
<br>
<br>
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
<?php ActiveForm::end(); ?>
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
</style>
<script>
    var addressPicker = new AddressPicker({
        map: {
            id: '#map',
        },
    });
    $('#mhspekerjaan-lokasi').typeahead(null, {
        displayKey: 'description',
        source: addressPicker.ttAdapter()
    });
    $('#mhspekerjaan-lokasi').bind("typeahead:selected", addressPicker.updateMap);
    $('#mhspekerjaan-lokasi').bind("typeahead:cursorchanged", addressPicker.updateMap);

    addressPicker.bindDefaultTypeaheadEvent($('#mhspekerjaan-lokasi'));
    $(addressPicker).on('addresspicker:selected', function (event, result) {
        $('#mhspekerjaan-lat').val(result.lat());
        $('#mhspekerjaan-long').val(result.lng());
        console.log(result);
    });

</script>
<?php
$my_js = '
    $("#mhspekerjaan-status").on("click", function(){
     if ( $("#mhspekerjaan-status").is(":checked") ) {
                    $("#akhir").hide();
                   } else {
                    $("#akhir").show();
                }
    })';
    $this->registerJs($my_js, \yii\web\View::POS_END);
?>