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
                                <option value="0">Year</option>
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

<div class="main-content content-business has-bg-image" data-bg-color="f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="sidebar-fields">
                        <div class="custom-select-box">
                            <select name="categories" class="custom-select">
                                <option value="0">Filter</option>
                                <option value="1">Most Popular</option>
                                <option value="2">The latest</option>
                            </select>
                        </div>
                        <input type="text" placeholder="Keyword">
                        <div class="custom-select-box">
                            <select name="categories" class="custom-select">
                                <option value="0">Categories</option>
                                <option value="1">Industrial Consultant</option>
                                <option value="1">Archiecture</option>
                                <option value="2">IT Consultant</option>
                                <option value="2">General Contractor</option>
                                <option value="2">Finance & Legal</option>
                                <option value="2">Creative Industry</option>
                                <option value="2">Cinema</option>
                            </select>
                        </div>
                        <div class="location">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" placeholder="Location">
                        </div>
                    </div>
                    <div class="sidebar-categories">
                        <h6>Capabilities</h6>
                        <ul>
                            <li>
                                <input type="checkbox">
                                <span class="title">Employee Managerial</span>
                                <span class="count">5</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Outsourcing Vendor</span>
                                <span class="count">4</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">GIS System</span>
                                <span class="count">3</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">IT Consultant</span>
                                <span class="count">3</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Supplier</span>
                                <span class="count">3</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Finance and legal</span>
                                <span class="count">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-button">
                        <button class="btn-medium btn-primary full-width">Filter Results</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="listing listing-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">PT. Angkasa Merah</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>HSSE Consultant</li>
                                                    <li>Environtment Specialist</li>
                                                    <li>Industrial Safety</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Surabaya, Indonesia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">PT. Sembilan Kejora</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>Man Power Specialist</li>
                                                    <li>Excellence Receptionist</li>
                                                    <li>Professional Cleaner</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Kediri, Indonesia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Excelence Services, Sdn. Bhd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>IT Consultant</li>
                                                    <li>Software Development</li>
                                                    <li>SEO Specialist</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Kuala Lumpur, Malaysia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Sapa Nusantara, Ltd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>Vessel Transportation</li>
                                                    <li>Shipment & Delivery</li>
                                                    <li>Man Power backup</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Surabaya, Indonesia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Excelence Services, Sdn. Bhd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>IT Consultant</li>
                                                    <li>Software Development</li>
                                                    <li>SEO Specialist</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Kuala Lumpur, Malaysia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Sapa Nusantara, Ltd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>Vessel Transportation</li>
                                                    <li>Shipment & Delivery</li>
                                                    <li>Man Power backup</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Surabaya, Indonesia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Sapa Nusantara, Ltd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>Vessel Transportation</li>
                                                    <li>Shipment & Delivery</li>
                                                    <li>Man Power backup</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Surabaya, Indonesia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Excelence Services, Sdn. Bhd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>IT Consultant</li>
                                                    <li>Software Development</li>
                                                    <li>SEO Specialist</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Kuala Lumpur, Malaysia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="listing-grid listing-grid-1">
                                <div class="listing-heading">
                                    <h5><a href="company-detail.html">Sapa Nusantara, Ltd</a></h5>
                                </div>
                                <div class="listing-inner">
                                    <div class="flexslider default-slider">
                                        <ul class="slides">
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/company-sidebar-thumb.png" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-2.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-1.jpg" alt=""></li>
                                            <li><img src="<?= Yii::$app->request->baseUrl ?>/img/thumb-img-3.jpg" alt=""></li>
                                        </ul>
                                        <div class="reviews">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span class="count">208 reviews</span>
                                        </div>
                                    </div>
                                    <ul class="uou-accordions">
                                        <li class="">
                                            <a href="#"><i class="fa fa-user main-icon"></i> Information</a>
                                            <div>
                                                <h5 class="title">Secondary Heading</h5>
                                                <p>Consequat ipsum, nec sagit sem nibh id elit duis sed odio</p>
                                                <div class="price">
                                                    <span class="currency">$</span>
                            <span class="price-inner">
                              59.00
                            </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <a href="#"><i class="fa fa-envelope main-icon"></i> Services</a>
                                            <div>
                                                <ul class="contact-info list-unstyled mb0">
                                                    <li>Vessel Transportation</li>
                                                    <li>Shipment & Delivery</li>
                                                    <li>Man Power backup</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul> <!-- end .uou-accordions -->
                                    <div class="info-footer">
                                        <i class="fa fa-map-marker location"></i>
                                        <h6>Surabaya, Indonesia</h6>
                                        <i class="fa fa-bookmark bookmark pull-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination">
                    <li><a href="#."><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#.">1</a></li>
                    <li class="current"><a href="#.">2</a></li>
                    <li><a href="#.">3</a></li>
                    <li><a href="#.">4</a></li>
                    <li><a href="#.">3</a></li>
                    <li><a href="#.">5</a></li>
                    <li><a href="#.">6</a></li>
                    <li><a href="#.">7</a></li>
                    <li><a href="#.">8</a></li>
                    <li><a href="#.">9</a></li>
                    <li><a href="#.">10</a></li>
                    <li><a href="#.">11</a></li>
                    <li><a href="#">12</a></li>
                    <li><a href="#">13</a></li>
                    <li><a href="#."><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>