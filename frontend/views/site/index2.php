<?php

$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    article > div > h1 {
        margin: 0 !important;
    }

    article > div > .date {
        margin-top: 0;
    }
</style>
<div class="homepage-banner has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/people-connected.jpg"
     style="padding: 0">
    <div class="container"
         style="height:100%;width:100%;background-color: rgba(0,0,0,0.6);padding: 120px 0px 110px 0px; ">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="text-align: center">
                <h3>Welcome Alumni!</h3>
                <h5 style="color: white;margin-bottom: 0">Looking for your classmate? let us help you.</h5>
                <p>Join our professional network to stay connected with IKA ITS Alumni and Company</p>
            </div>
            <div class="col-md-6" style="text-align: right">
                <a class="btn btn-social btn-linkedin">
                    <span class="fa fa-linkedin"></span> Sign in with Linkedin
                </a>
            </div>
            <div class="col-md-6" style="text-align: left">
                <a class="btn btn-social btn-facebook">
                    <span class="fa fa-facebook"></span> Sign in with Facebook
                </a>
            </div>
        </div>
    </div>
</div>

<div class="categories" style="padding: 10px 67px">
    <div class="container">
        <div class="row" style="vertical-align: middle; padding: 0 15px">
            <h4 style="float: left">Event & Activity</h4>
            <a href="#" class="btn btn-primary btn-xs" style="float: right; margin-top: 12px">
                View More&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="row" style="text-align: left">

            <section class="demo-section">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($modelEvent as $event) {
                        ?>
                        <div class="col-sm-4">
                            <article class="uou-block-7g" data-badge-color="0099ff">
                                <img class="image" src="<?= Yii::$app->urlManagerEvent->baseUrl . '/' . $event->gambar ?>" alt="" style="width: 100%;height: 200px;border: 1px;border-style: outset;">

                                <span class="badge" style="background-color: rgb(0, 153, 255);">In The Lab</span>

                                <div class="content">
                                    <span class="date"><?= $event->tanggal ?></span>

                                    <h1><?= $event->judul ?></h1>

                                    <p><?= $event->isi ?></p>
                                </div>
                            </article> <!-- end .uou-block-7g -->
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="sponsors sponsors-2 has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/banner.jpg"
     data-bg-color="000" data-bg-opacity=".20">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h3 class="section-title" style="margin-bottom: 0">Endowment & Donation</h3>
                <p style="width: 100%; color: #fff;">
                    University endowment is a donation from alumni and corporate that collected for univeristy
                </p>
                <div class="sponsors-slider">
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo1_1.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo2_2.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo3_3.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo4_4.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo5_5.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo6_6.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo4_4.png" alt=""
                                           class="img-responsive"></div>
                </div>
                <a href="<?= Yii::$app->request->baseUrl.'/endowment' ?>" class="btn btn-primary" style="margin-top:50px">
                    View More&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="categories" style="padding: 10px 67px">
    <div class="container">


        <div class="row" style="vertical-align: middle; padding: 0 15px">
            <h4 style="float: left">News & Article</h4>
            <a href="#" class="btn btn-primary btn-xs" style="float: right; margin-top: 12px">
                 View More&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
            </a>
        </div>
        <div class="row" style="text-align: center">
            <section class="demo-section">


                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <article class="uou-block-7g" data-badge-color="0099ff">
                                <img class="image" src="img/blog-image-1.png" alt="">

                                <span class="badge" style="background-color: rgb(0, 153, 255);">In The Lab</span>

                                <div class="content">
                                    <span class="date">01 / 24 / 2015</span>

                                    <h1>Pariatur Velit Corrupti</h1>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quas numquam
                                        repudiandae, nobis natus blanditiis fugiat placeat quod, officia ut aspernatur
                                        expedita illum.</p>
                                </div>
                            </article> <!-- end .uou-block-7g -->
                        </div>

                        <div class="col-sm-4">
                            <article class="uou-block-7g" data-badge-color="ff0099">
                                <img class="image" src="img/blog-image-2.png" alt="">

                                <span class="badge" style="background-color: rgb(255, 0, 153);">In The Lab</span>

                                <div class="content">
                                    <span class="date">01 / 24 / 2015</span>

                                    <h1>Pariatur Velit Corrupti</h1>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quas numquam
                                        repudiandae, nobis natus blanditiis fugiat placeat quod, officia ut aspernatur
                                        expedita illum.</p>
                                </div>
                            </article> <!-- end .uou-block-7g -->
                        </div>

                        <div class="col-sm-4">
                            <article class="uou-block-7g" data-badge-color="ff9900">
                                <img class="image" src="img/blog-image-3.png" alt="">

                                <span class="badge" style="background-color: rgb(255, 153, 0);">In The Lab</span>

                                <div class="content">
                                    <span class="date">01 / 24 / 2015</span>

                                    <h1>Pariatur Velit Corrupti</h1>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quas numquam
                                        repudiandae, nobis natus blanditiis fugiat placeat quod, officia ut aspernatur
                                        expedita illum.</p>
                                </div>
                            </article> <!-- end .uou-block-7g -->
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="category-block">
                    <div class="category-header header-jobs">
                        <h5>Proffesional Database</h5>
                        <div class="icon">
                            <div class="icon-inner">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-inner">

                        <div class="uou-progressbar-single">
                            <h6> Industrial</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 36%"></span>
              <b class="progress-percent">36%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Management</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 29%"></span>
              <b class="progress-percent">29%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Accounting</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 14%"></span>
              <b class="progress-percent">14%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Information Technology</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 10%"></span>
              <b class="progress-percent">10%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Banking</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 8%"></span>
              <b class="progress-percent">8%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Other</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 3%"></span>
              <b class="progress-percent">3%</b>
            </span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-block">
                    <div class="category-header header-business">
                        <h5>Business Directory</h5>
                        <div class="icon">
                            <div class="icon-inner">
                                <i class="fa fa-suitcase"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-inner">

                        <div class="uou-progressbar-single">
                            <h6> Contractor Services</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 36%"></span>
              <b class="progress-percent">36%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Industrial Supply</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 29%"></span>
              <b class="progress-percent">29%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> IT Consultant</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 14%"></span>
              <b class="progress-percent">14%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Food & Baverage</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 10%"></span>
              <b class="progress-percent">10%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Creative Industry</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 8%"></span>
              <b class="progress-percent">8%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Other</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 3%"></span>
              <b class="progress-percent">3%</b>
            </span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="category-block">
                    <div class="category-header header-restaurant">
                        <h5>Regional</h5>
                        <div class="icon">
                            <div class="icon-inner">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="category-inner">

                        <div class="uou-progressbar-single">
                            <h6> East Java</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 36%"></span>
              <b class="progress-percent">36%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Jakarta</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 29%"></span>
              <b class="progress-percent">29%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> West Java</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 14%"></span>
              <b class="progress-percent">14%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Australia</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 10%"></span>
              <b class="progress-percent">10%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Europe</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 8%"></span>
              <b class="progress-percent">8%</b>
            </span>
                        </div>

                        <div class="uou-progressbar-single">
                            <h6> Other</h6>
                            <span class="main-bar">
              <span class="inner-bar one" style="width: 3%"></span>
              <b class="progress-percent">3%</b>
            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sponsors sponsors-2 has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/banner.jpg"
     data-bg-color="0082c6" data-bg-opacity=".20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Our Sponsors</h3>
                <div class="sponsors-slider">
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo1_1.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo2_2.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo3_3.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo4_4.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo5_5.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo6_6.png" alt=""
                                           class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo4_4.png" alt=""
                                           class="img-responsive"></div>
                </div>
            </div>
        </div>
    </div>
</div>
