<?php
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap\Progress;

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

    <div class="team">
        <div class="container pb30">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
                <?=
                 GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'attribute' => 'nama',
                        'format' => 'raw',
                        'value' => function($data){

                            return $data->nama.' '.Progress::widget([
                                    'bars' => [
                                        ['percent' => Yii::$app->runAction('endowment/persent', ['idKontrak' => $data->id]),
                                            'label' => Yii::$app->runAction('endowment/persent', ['idKontrak' => $data->id]) . '%',
                                            'options' => ['class' => 'progress-bar-warning']
                                        ],

                                    ]
                            ]);
                        }
                    ],

                ],
]);
                ?>
            </div>
        </div>
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
























