<div class="toolbar">
    <div class="uou-block-1a blog">
        <div class="container">
            <ul class="quick-nav">
                <li><a href="<?= Yii::$app->request->baseUrl ?>/about">About Us</a></li>
                <li><a href="<?= Yii::$app->request->baseUrl ?>/blog">Blog</a></li>
                <li><a href="<?= Yii::$app->request->baseUrl ?>/contact">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>

            <ul class="social">
                <li><a href="#" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-google-plus"></a></li>
            </ul>

            <ul class="authentication">
                <?php
                if (!Yii::$app->user->isGuest) {
                    ?>
                    <li><a href="<?= Yii::$app->request->baseUrl ?>/profile"> Hi <?= Yii::$app->user->identity->nama_lengkap ?></a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl ?>/site/logout"> logout</a></li>
                <?php } else { ?>
                    <li><a href="<?= Yii::$app->request->baseUrl ?>/site/login"> Login</a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl ?>/site/signup"> Register</a></li>
                <?php }?>

            </ul>

            <div class="language">
                <a href="#" class="toggle"><img src="<?= Yii::$app->request->baseUrl ?>/img/flags/32/NL.png" alt=""> INA</a>

                <ul>
                    <li><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/img/flags/32/PT.png" alt=""> PT</a>
                    </li>
                    <li><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/img/flags/32/FR.png" alt=""> FR</a>
                    </li>
                    <li><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/img/flags/32/ES.png" alt=""> ES</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!-- end .uou-block-1a -->
</div> <!-- end toolbar -->

<div class="header-nav">
    <div class="box-shadow-for-ui">
        <div class="uou-block-2b icons">
            <div class="container">
                <a href="<?= Yii::$app->request->baseUrl ?>" class="logo-top"><img src="<?= Yii::$app->request->baseUrl ?>/img/logo-ika-its.png"
                                                  width="170px" alt=""></a>
                <a href="#" class="mobile-sidebar-button mobile-sidebar-toggle"><span></span></a>

                <nav class="nav">
                    <ul class="sf-menu">
                        <li class="active"><a href="<?= Yii::$app->request->baseUrl ?>"><i class="fa fa-home"></i> Home</a>

                        </li>
                        <li><a href="#"><i class="fa fa-users"></i> Networking</a>
                            <ul class="demo-menu">
                                <li><a href="<?= Yii::$app->request->baseUrl.'/alumni-directory' ?>">Alumni Directory</a></li>
                                <li><a href="<?= Yii::$app->request->baseUrl.'/company-list' ?>">Company Directory</a></li>
                                <li><a href="<?= Yii::$app->request->baseUrl.'/map' ?>">Regional</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= Yii::$app->request->baseUrl.'/forum' ?>"><i class="fa fa-comments"></i> Discussion Group</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-thumbs-up"></i> Endowment</a>
                            <ul class="demo-menu">
                                <li><a href="<?= Yii::$app->request->baseUrl.'/endowment' ?>">Personal Endowment</a></li>
                                <li><a href="<?= Yii::$app->request->baseUrl.'/endowment/corporate' ?>">Corporate Endowment</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Event & Activity</a>
                            <ul class="demo-menu">
                                <li><a href="<?= Yii::$app->request->baseUrl ?>/news">News & Article</a></li>
                                <li><a href="regional-event.html">Regional Event</a></li>
                                <li><a href="group-activity.html">Group Activity</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-star"></i> Jobs</a>
                            <ul class="demo-menu">
                                <li><a href="<?= Yii::$app->request->baseUrl ?>/vacancies">Vacancies</a></li>
                                <li><a href="<?= Yii::$app->request->baseUrl ?>/volunteer">Volunteer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-search-plus"></i> About</a>
                            <ul class="demo-menu">
                                <li><a href="<?= Yii::$app->request->baseUrl ?>/about">About Us</a></li>
                                <li><a href="<?= Yii::$app->request->baseUrl ?>/ika-its">IKA ITS</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div> <!-- end .uou-block-2b -->
    </div>
</div> <!-- edn header-navm -->
