<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;

$this->title = 'Profile ';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="subheader has-bg-image"
         data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/single-business-header.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="subheader-title"><?= $model->nama_lengkap ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content content-restaurant has-bg-image" data-bg-color="f5f5f5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="listing listing-1">
                        <div class="listing-ver-6">
                            <div class="listing-heading">
                                <h5>Personal Data</h5>
                            </div>
                            <div class="listing-inner">
                                <div class="flexslider default-slider">
                                    <ul class="slides">
                                        <li><img
                                                src="<?= Yii::$app->request->baseUrl . '/uploads/mhs/' . $model->foto ?>"
                                                alt=""></li>
                                    </ul>
                                </div>
                                <div class="listing-content">
                                    <h6 class="title-company"><i class="fa fa-star"></i> <?= $model->pekerjaan ?></h6>
                  <span class="location">
                    <i class="fa fa-bookmark"></i><?= $model->namaJurusan->nama_jurusan ?>
                  </span>
                                    <i class="fa fa-btc"></i><font color="#e74c3c"> <strong>Point Endowment
                                            : <?= \app\components\Angka::toReadableAngka($poin, TRUE) . " Poin"; ?></strong></font>
                                    <ul class="more-info list-inline">
                                        <li class="info info-reviews">
                                            <ul class="rate list-inline">
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                            <span class="count"></span>
                                        </li>
                                    </ul>
                                    <br/>
                                    <br/>
                                    <h6 class="title-tags">Skill:</h6>
                                    <ul class="tags list-inline">
                                        <?php foreach ($modelSk as $ModelSkill) { ?>
                                            <li><a><?= $ModelSkill->skill->nama ?>
                                                </a></li>
                                        <?php } ?>
                                        <li>

                                        </li>
                                    </ul>
                                </div>
                                <p class="additional-content">
                                    <?= $model->deskripsi ?>
                            </div>
                        </div>
                    </div>
                    <div class="advertiser-info">
                        <div class="advertiser-header">
                            <h5>Experience</h5>
                        </div>
                        <div class="advertiser-inner">
                            <?php foreach ($modelEx as $experience) { ?>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <ul class="contact">
                                    <span><img src="<?= Yii::$app->request->baseUrl . '/img/karir.png' ?>"
                                               style="width:50px;">
                                                </span>
                                        </ul>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <ul class="contact">
                                            <span><strong><?= $experience->posisi ?></strong></span><br>
                                            <span><?= $experience->nama_perusahaan ?></span><br>
                                        <span><?= $experience->tanggal_mulai ?>
                                            <?php
                                            if ($experience->status == "") {
                                                echo " s/d sekarang";
                                            } else {
                                                echo " s/d " . $experience->tanggal_akhir;
                                            }
                                            ?>

                                        </span>
                                        </ul>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <ul class="contact">
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="advertiser-info">
                        <div class="advertiser-header">
                            <h5>Interest</h5>
                        </div>
                        <div class="advertiser-inner">
                            <?php foreach ($modelIn as $interest) { ?>
                                <div class="row">
                                    <div class="col-md-10 col-sm-10">
                                        <ul class="contact">
                                            <span><li><?= $interest->categori->nama ?></li></span>
                                        </ul>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <ul class="contact">
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="sidebar-listing">
                        <h5 class="sidebar-listing-title">Similar Person</h5>
                        <?php foreach ($randM as $rand) { ?>
                            <div class="listing-offer">

                                <h6 class="title"><a href="<?= Yii::$app->request->baseUrl.'/alumni-directory/detail?id='.$rand->id ?>"><?= $rand->nama_lengkap ?></a></h6>

                                <div class="listing-offer-thumbnail">
                                    <img src="<?= Yii::$app->request->baseUrl . '/uploads/mhs/' . $rand->foto ?>"
                                         alt="">
                                </div>
                                <div class="listing-offer-content">
                                    <span class="location"><i class="fa fa-map-marker"></i> <?= $rand->kota ?></span>
                            <span class="location"><i class="fa fa-bookmark"></i>
                                <?php if ($rand->jurusan == NULL) {
                                    echo '';
                                } else {
                                    echo $rand->namaJurusan->nama_jurusan;
                                } ?>
                                </span>
                            <span class="location"><i class="fa fa-star"></i> <?php if ($rand->pekerjaan == NULL) {
                                    echo '';
                                } else {
                                    echo $rand->pekerjaan;
                                } ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 0;
            background-color: #000;
        }

    </style>
<?php
if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
    ?>
    <style>
        .modal-content {
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
    <?php
} else { // desktop browser
    ?>
    <style>
        .modal-content {
            margin-left: 200px;
            margin-right: 200px;
        }
    </style>
    <?php
}
?>