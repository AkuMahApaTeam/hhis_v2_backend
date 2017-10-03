<?php
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subheader subheader-v2 has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl.'/' ?>img/donation.jpg" style="padding: 0">
    <div class="container" style="background-color: rgba(0,0,0,0.4); width: 100%; height: 300px">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top: 95px;">
                <h1 class="block-title">
                    Giving for Other</h1>

                <p class="block-secondary-title invert">We are driven by your mission </p>
            </div>
        </div>
    </div>
</div>

<div class="about has-bg-image" data-bg-color="f5f5f5">

    <article class="uou-block-7b secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="css-table">
                        <div class="css-table-cell content">
                            <h1>Our Mission</h1>

                            <p>
                                we has worked for more than threes decades. In recent years, it has responded to nearly
                                all minor, medium-sized and major natural disasters in the country. In addition to
                                providing immediate relief to children and families after a disaster, we help
                                communities prepare for emergencies and reduce risks posed by disasters in the future.
                            </p>
                            <a href="#" class="btn btn-primary">Partner with us</a>
                        </div>
                        <div class="css-table-cell image has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl.'/' ?>img/donate2.jpg"
                             style="background-image: url(&quot;<?= Yii::$app->request->baseUrl.'/' ?>img/donate2.jpg&quot;);">
                            <img class="hidden-image" src="<?= Yii::$app->request->baseUrl ?>/img/donate2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>


    <div class="team">
        <div class="container pb30">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-section">
                        Every Donation is Valuable for Others
                    </h3>
                </div>
                <div class="col-sm-3">
                    <div class="uou-block-6a">
                        <div class="imgcaption">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/donation1.png" alt="">
                            <cap><font color="white"><h6
                                        style="color: white"><?= 'Rp ' . \app\components\Angka::toReadableAngka($modelEnda->nilai, FALSE); ?></h6>
                                </font></cap>
                        </div>
                        <div class="bwh" style="padding: 10px">
                            <a href="<?= Yii::$app->request->baseUrl . '/endowment/bulana' ?>"
                               onclick="return confirm('Apakah anda setuju?')" class="btn btn-small btn-info"><i
                                    class="fa fa-gift"></i> Monthly</a>
                            <a href="<?= Yii::$app->request->baseUrl . '/endowment/onea' ?>"
                               onclick="return confirm('Apakah anda setuju?')" class="btn btn-small btn-success"><i
                                    class="fa fa-flag"></i> One time</a>
                        </div>
                    </div> <!-- end .uou-block-6a -->
                </div>

                <div class="col-sm-3">
                    <div class="uou-block-6a">
                        <div class="imgcaption">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/donation2.png" alt="">
                            <cap><font color="white"><h6
                                        style="color: white"><?= 'Rp ' . \app\components\Angka::toReadableAngka($modelEndb->nilai, FALSE); ?></h6>
                                </font></cap>
                        </div>
                        <div class="bwh" style="padding: 10px">
                            <a href="<?= Yii::$app->request->baseUrl . '/endowment/bulanb' ?>"
                               onclick="return confirm('Apakah anda setuju?')" class="btn btn-small btn-info"><i
                                    class="fa fa-gift"></i> Monthly</a>
                            <a href="<?= Yii::$app->request->baseUrl . '/endowment/oneb' ?>"
                               onclick="return confirm('Apakah anda setuju?')" class="btn btn-small btn-success"><i
                                    class="fa fa-flag"></i> One time</a>
                        </div>
                    </div> <!-- end .uou-block-6a -->
                </div>

                <div class="col-sm-3">
                    <div class="uou-block-6a">
                        <div class="imgcaption">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/donation3.png" alt="">
                            <cap><font color="white"><h6
                                        style="color: white"><?= 'Rp ' . \app\components\Angka::toReadableAngka($modelEndc->nilai, FALSE); ?></h6>
                                </font></cap>
                        </div>
                        <div class="bwh" style="padding: 10px">
                            <a href="<?= Yii::$app->request->baseUrl . '/endowment/bulanc' ?>"
                               onclick="return confirm('Apakah anda setuju?')" class="btn btn-small btn-info"><i
                                    class="fa fa-gift"></i> Monthly</a>
                            <a href="<?= Yii::$app->request->baseUrl . '/endowment/onec' ?>"
                               onclick="return confirm('Apakah anda setuju?')" class="btn btn-small btn-success"><i
                                    class="fa fa-flag"></i> One Time</a>
                        </div>
                    </div> <!-- end .uou-block-6a -->
                </div>

                <div class="col-sm-3">
                    <div class="uou-block-6a">
                        <div class="imgcaption">
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/donation4.png" alt="">
                            <cap><font color="white"><h6
                                        style="color: white">Lainnya</h6>
                                </font></cap>
                        </div>
                        <div class="bwh" style="padding: 10px">
                            <a href="#popup" class="btn btn-small btn-success">Other</a>
                        </div>
                    </div> <!-- end .uou-block-6a -->
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="container pb30">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-section">
                        Event Donation
                    </h3>
                </div>
                <?=
                \yii\widgets\ListView::widget(['dataProvider' => $dataProvider,
                    'layout' => "{items}\n{pager}",
                    'options' => [
                        'tag' => 'div',
                        'class' => 'list-wrapper',
                        'id' => 'list-wrapper',
                    ],

                    'itemView' => function ($model) {
                        return $this->render('_list_item', ['model' => $model]);
                    },
                ]);
                ?>
            </div>
        </div>
    </div>
</div>

<div id="popup">
    <div class="window">
        <a href="#" class="close-button" title="Close">X</a>
        <?php $form = ActiveForm::begin([
                'id' => 'endowment',
                'method' => 'post',
                'action' => ['endowment/othero'],
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error',
                'options' => ['enctype' => 'multipart/form-data'],
            ]
        );
        ?>



        <?= $form->field($modelO, 'jumlah')->widget(Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\frontend\models\MasterDonasi::find()->all(), 'id', 'nilai'),
            'language' => 'de',
            'options' => ['placeholder' => 'Pilih Donasi ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],]) ?>


        <div class="box-footer">
            <?php echo $form->errorSummary($modelO); ?>
            <?= Html::button('One Time', [
                'type' => 'submit',
                'class' => 'btn btn-success',
                'name' => 'one',
                'id' => 'one'
            ]) ?>
            <?= Html::button('Monthly', [
                'type' => 'submit',
                'class' => 'btn btn-info',
                'name' => 'monthly',
                'id' => 'monthly'
            ]) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<style>
    .imgcaption {
        position: relative;
    }

    .imgcaption cap {
        position: absolute;
        left: 0%;
        right: 0%;
        background: black;
        color: white;
        opacity: 0.8 !important;
        bottom: 0%;
    }

    #button {
        margin: 5% auto;
        width: 100px;
        text-align: center;
    }

    #button a {
        width: 100px;
        height: 30px;
        vertical-align: middle;
        background-color: #F00;
        color: #fff;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid transparent;
    }

    /* Jendela Pop Up */
    #popup {
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(0, 0, 0, .7);
        top: 0;
        left: 0;
        z-index: 9999;
        visibility: hidden;
    }

    .window {
        width: 400px;
        background: #fff;
        border-radius: 10px;
        position: relative;
        padding: 10px;
        text-align: center;
        margin: 15% auto;
    }

    .window h2 {
        margin: 30px 0 0 0;
    }

    /* Button Close */
    .close-button {
        width: 6%;
        height: 20%;
        line-height: 23px;
        background: #000;
        border-radius: 50%;
        border: 3px solid #fff;
        display: block;
        text-align: center;
        color: #fff;
        text-decoration: none;
        position: absolute;
        top: -10px;
        right: -10px;
    }

    /* Memunculkan Jendela Pop Up*/
    #popup:target {
        visibility: visible;
    }
</style>
<?php
if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
    ?>
    <style>
        .uou-block-6a img {
            width: 80%;
            height: auto;
        }
        .imgcaption cap {
            position: absolute;
            left: 10%;
            right: 10%;
            background: black;
            color: white;
            opacity: 0.8 !important;
            bottom: 0%;
        }
        .btna {
            display: inline-block;
            width: 100%;
            margin-bottom: 0;
            font-weight: inherit;
            text-align: center;
            vertical-align: middle;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 0;
            white-space: nowrap;
            color: #ffffff;
            padding: 8px 21.312px;
            transition: all 0.3s;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 13px;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 5px;
        }
        .window {
            width: 300px;
            background: #fff;
            border-radius: 10px;
            position: relative;
            padding: 10px;
            text-align: center;
            margin: 15% 10%;
        }
    </style>
    <?php
} else { // desktop browser
    ?>
<style>
    .btna {
        display: inline-block;
        margin-bottom: 0;
        font-weight: inherit;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 0;
        white-space: nowrap;
        color: #ffffff;
        padding: 8px 21.312px;
        transition: all 0.3s;
        border-radius: 3px;
        text-transform: uppercase;
        font-size: 13px;
        font-family: 'Montserrat', sans-serif;
    }
</style>
    <?php
}
?>
