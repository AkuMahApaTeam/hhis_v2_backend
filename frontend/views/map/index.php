<?php
$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-form">
    <div class="advanced-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Cost</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-sm-9">
                                <div class="slider-range-container">
                                    <div class="slider-range" data-min="1" data-max="10000" data-step="2" data-default-min="500" data-default-max="8000" data-currency="$"></div>
                                    <div class="clearfix">
                                        <input type="text" class="range-from" value="1">
                                        <input type="text" class="range-to" value="60">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Rating</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="slider-range-container">
                                    <div class="slider-range" data-min="1" data-max="6" data-step="1" data-default-min="1" data-default-max="6" data-currency=" &nbsp; "></div>
                                    <div class="clearfix">
                                        <input type="text" class="range-from" value="1">
                                        <input type="text" class="range-to" value="6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Days published</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="slider-range-container">
                                    <div class="slider-range" data-min="1" data-max="30" data-step="1" data-default-min="4" data-default-max="10" data-currency=" &nbsp; "></div>
                                    <div class="clearfix">
                                        <input type="text" class="range-from" value="2">
                                        <input type="text" class="range-to" value="30">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Location</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" placeholder="Switzerland">
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Keywords</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" placeholder="Freelance">
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Industry</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="custom-select-box">
                                    <select name="industry" class="custom-select">
                                        <option value="0">IT</option>
                                        <option value="1">Hobby</option>
                                        <option value="2">Sport</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="map-top"></div>
    <div class="map-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--
                  <div class="map-toggleButton">
                    <i class="fa fa-bars"></i>
                  </div>-->
                    <div class="map-search-fields">
                        <div class="field">
                            <input type="text" placeholder="Keyword (ex:name or workfield)">
                        </div>
                        <div class="field">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" placeholder="Location" class="location">
                        </div>
                        <div class="field custom-select-box">
                            <select name="categories" class="custom-select">
                                <option value="0">Year of ...</option>
                                <option value="1">2015</option>
                                <option value="1">2014</option>
                                <option value="1">2013</option>
                                <option value="1">2013</option>
                                <option value="1">2012</option>
                                <option value="1">2011</option>
                                <option value="1">2010</option>
                                <option value="1">2009</option>
                                <option value="1">2008</option>
                                <option value="1">2007</option>
                            </select>
                        </div>
                    </div>
                    <div class="search-button">
                        <button class="btn btn-medium btn-primary">Search Partner</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="content" style="padding: 80px 10%">
    <div class="row">
        <div class="col-sm-4">
            <div class="uou-block-6a rounded">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/sby.png" alt="">
                <h6>Surabaya, East Java<span>Indonesia</span></h6>
            </div> <!-- end .uou-block-6a -->
        </div>
        <div class="col-sm-4">
            <div class="uou-block-6a rounded">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/jkt.png" alt="">
                <h6>Jakarta<span>Indonesia</span></h6>
            </div> <!-- end .uou-block-6a -->
        </div>
        <div class="col-sm-4">
            <div class="uou-block-6a rounded">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/bdg.png" alt="">
                <h6>Bandung, West Java<span>Indonesia</span></h6>
            </div> <!-- end .uou-block-6a -->
        </div>
        <div class="col-sm-4">
            <div class="uou-block-6a rounded">
                <img src="<?= Yii::$app->request->baseUrl ?>/img/kl.png" alt="">
                <h6>Kuala Lumpur<span>Malaysia</span></h6>
            </div> <!-- end .uou-block-6a -->
        </div>
    </div>
</div>

<div class="uou-block-5a uou-twitter-content has-bg-image" data-bg-image="img/banner.jpg" data-bg-color="000" data-bg-opacity=".20">
    <div class="container">
        <blockquote>
            <div class="flexslider default-slider">
                <ul class="slides">
                    <li class="">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">bit.ly/link</a>

                        <div class="twitt-details">
                            <p>
                                <span>2 week ago</span>
                                <a href="#">Reply</a>
                                <a href="#">Retweet</a>
                                <a href="#">Favorite</a>
                            </p>
                        </div>
                    </li>

                    <li class="">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">bit.ly/link</a>

                        <div class="twitt-details">
                            <p>
                                <span>4 week ago</span>
                                <a href="#">Reply</a>
                                <a href="#">Retweet</a>
                                <a href="#">Favorite</a>
                            </p>
                        </div>
                    </li>

                    <li class="">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#">bit.ly/link</a>

                        <div class="twitt-details">
                            <p>
                                <span>3 week ago</span>
                                <a href="#">Reply</a>
                                <a href="#">Retweet</a>
                                <a href="#">Favorite</a>
                            </p>
                        </div>
                    </li>

                </ul>
            </div>
        </blockquote>
    </div>
</div> <!-- end .uou-block-5a -->

<div class="sponsors has-bg-image" data-bg-color="f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="section-title">Our Sponsors</h3>
                <div class="sponsors-slider">
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo1.png" alt="" class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo2.png" alt="" class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo3.png" alt="" class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo4.png" alt="" class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo5.png" alt="" class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo6.png" alt="" class="img-responsive"></div>
                    <div class="item"><img src="<?= Yii::$app->request->baseUrl ?>/img/sponsor_logo4.png" alt="" class="img-responsive"></div>
                </div>
            </div>
        </div>
    </div>
</div>