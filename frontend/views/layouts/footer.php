<div class="uou-block-4e has-bg-image" data-bg-color="ffffff">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="#" class="logo"><img src="<?= Yii::$app->request->baseUrl ?>/img/logo-ika-its.png" alt=""></a>
                <ul style="background-image: url(&quot;img/footer-map-bg.png&quot;);" class="contact-info has-bg-image contain" data-bg-image="img/footer-map-bg.png">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <address>795 Folsom Ave, Suite 600, San Francisco, CA 94107</address>
                    </li>

                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="tel:#">(123) 456-7890</a>
                    </li>

                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:#">first.last@example.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6">
                <h5>Twitter Feed</h5>

                <ul class="twitter-feed">
                    <li>
                        RT <a href="#">@no1son</a>: Now this <a href="#">http://t.co/TSfMW1qMAW</a> is one hell of a stunning site!!! Awesome work guys <a href="#">@AIRNAUTS</a>
                        <a href="#" class="time">May 25</a>
                    </li>

                    <li>
                        Check out the wordpress version of Tucson - <a href="#">http://t.co/sBlU3GbapT</a>
                        <a href="#" class="time">May 22</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6">
                <h5>Photostream</h5>

                <ul class="photos-list">
                    <li><img src="<?= Yii::$app->request->baseUrl ?>/img/photostream4.jpg" alt=""></li>
                    <li><img src="<?= Yii::$app->request->baseUrl ?>/img/photostream6.jpg" alt=""></li>
                    <li><img src="<?= Yii::$app->request->baseUrl ?>/img/photostream3.jpg" alt=""></li>
                    <li><img src="<?= Yii::$app->request->baseUrl ?>/img/photostream2.jpg" alt=""></li>
                    <li><img src="<?= Yii::$app->request->baseUrl ?>/img/photostream1.jpg" alt=""></li>
                    <li><img src="<?= Yii::$app->request->baseUrl ?>/img/photostream.jpg" alt=""></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6">
                <h5>Newsletter</h5>

                <p>Subscribe to our newsletter to receive our latest news and updates. We do not spam.</p>

                <form class="newsletter-form" action="#">
                    <input placeholder="Enter your email address" type="email">
                    <input class="btn btn-primary" value="Subscribe" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="uou-block-4a secondary">
    <div class="container">
        <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
        </ul>

        <p>Copyright © 2015 Quck Finder. All Rights reserved.</p>
    </div>
</div>
</div>

<div class="uou-block-11a">
    <h5 class="title">Menu</h5>
    <a href="#" class="mobile-sidebar-close">&times;</a>
    <nav class="main-nav">
        <ul>
            <li class="active"><a href="#">Account</a> </li>
            <?php
            if (!Yii::$app->user->isGuest) {
                ?>
                <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>/profile"> Hi <?= Yii::$app->user->identity->nama_lengkap ?></a></li>
                <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>/site/logout"> logout</a></li>
            <?php } else { ?>
                <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>/site/login"> Login</a></li>
                <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>/site/signup"> Register</a></li>
            <?php }?>

            <li class="active"><a href="#">Home</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>">Home</a></li>

            <li class="active"><a href="#">Networking</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/alumni-directory' ?>">Alumni Directory</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/company-list' ?>">Company Directory</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/map' ?>">Regional</a></li>

            <li class="active"><a href="#">Discussion Group</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>">Discussion Group</a></li>

            <li class="active"><a href="#">Endowment</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/endowment' ?>">Personal Endowment</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>">Corporate Endowment</a></li>

            <li class="active"><a href="#">Event & Activity</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/seminar' ?>">Seminar & Workshop</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/news' ?>">News & Article</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>">Regional Event</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl ?>">Group Activity</a></li>

            <li class="active"><a href="#">Jobs</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/vacancies' ?>">Vacancies</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/volunteer' ?>">Volunteer</a></li>

            <li class="active"><a href="#">About</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/about' ?>">About Us</a></li>
            <li class="pl10"><a href="<?= Yii::$app->request->baseUrl.'/ika-its' ?>">IKA ITS</a></li>

        </ul>
    </nav>

    <hr>

</div>
