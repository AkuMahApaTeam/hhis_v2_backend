<?php
$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-form">
    <div class="company-banner has-bg-image" data-bg-image="img/company-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>HeadHunters are<br> Hunting for talent</h3>
                    <div class="btn-group">
                        <a href="#" class="btn btn-large btn-transparent-primary">Register Now</a>
                        <a href="#" class="btn btn-large btn-transparent-primary">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="map-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map-toggleButton">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="map-search-fields">
                        <div class="field">
                            <input type="text" placeholder="Filter by keyword">
                        </div>
                        <div class="field">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" placeholder="Location" class="location">
                        </div>
                        <div class="field custom-select-box">
                            <select name="categories" class="custom-select">
                                <option value="0">Categories</option>
                                <option value="1">Spa</option>
                                <option value="2">Cinema</option>
                            </select>
                        </div>
                    </div>
                    <div class="search-button">
                        <button class="btn btn-medium btn-primary">Search business</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content company-content has-bg-image" data-bg-color="f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="header-listing">
                    <h6>Sort by</h6>
                    <div class="custom-select-box">
                        <select name="order" class="custom-select">
                            <option value="0">Most popular</option>
                            <option value="1">The latest</option>
                            <option value="2">The best rating</option>
                        </select>
                    </div>
                    <ul class="listing-views">
                        <li class="active"><a href="#"><i class="fa fa-list"></i></a></li>
                        <li><a href="#"><i class="fa fa-th"></i></a></li>
                        <li><a href="#"><i class="fa fa-th-large"></i></a></li>
                    </ul>
                </div>
                <div class="listing listing-1">
                    <div class="listing-ver-3">
                        <div class="listing-heading">
                            <h5>Front-End Web Developer</h5>
                            <ul class="bookmark list-inline">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                        <div class="listing-inner">
                            <div class="listing-content">
                                <h6 class="title-company">Mars Planet Telecommunications Inc.</h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                    Manhattan, New york, USA
                  </span>
                  <span class="type-work full-time">
                    Full Time
                  </span>
                                <p>Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio pellentesque habitant morbi tristique senectus et netus et malesuada. <a href="single_job.html">read more</a></p>
                                <h6 class="title-tags">Skills required:</h6>
                                <ul class="tags list-inline">
                                    <li><a href="#">Javascript</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">Presta</a></li>
                                    <li><a href="#">Sass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="listing-tabs">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> email@mail.com</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> 012 345 678</a></li>
                                <li><a href="#"><i class="fa fa-globe"></i> www.webstite.com</a></li>
                                <li class="share-button">
                                    <a href="#"><i class="fa fa-share"></i> Share</a>
                                    <div class="contact-share">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="listing-ver-3">
                        <div class="listing-heading">
                            <h5>Android Developer</h5>
                            <ul class="bookmark list-inline">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                        <div class="listing-inner">
                            <div class="listing-content">
                                <h6 class="title-company">Mars Planet Telecommunications Inc.</h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                    Manhattan, New york, USA
                  </span>
                  <span class="type-work full-time">
                    Full Time
                  </span>
                                <p>Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio pellentesque habitant morbi tristique senectus et netus et malesuada. <a href="single_job.html">read more</a></p>
                                <h6 class="title-tags">Skills required:</h6>
                                <ul class="tags list-inline">
                                    <li><a href="#">Javascript</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">Presta</a></li>
                                    <li><a href="#">Sass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="listing-tabs">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> email@mail.com</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> 012 345 678</a></li>
                                <li><a href="#"><i class="fa fa-globe"></i> www.webstite.com</a></li>
                                <li class="share-button">
                                    <a href="#"><i class="fa fa-share"></i> Share</a>
                                    <div class="contact-share">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="listing-ver-3">
                        <div class="listing-heading">
                            <h5>User Experience Designer</h5>
                            <ul class="bookmark list-inline">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                        <div class="listing-inner">
                            <div class="listing-content">
                                <h6 class="title-company">Mars Planet Telecommunications Inc.</h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                    Manhattan, New york, USA
                  </span>
                  <span class="type-work full-time">
                    Full Time
                  </span>
                                <p>Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio pellentesque habitant morbi tristique senectus et netus et malesuada. <a href="single_job.html">read more</a></p>
                                <h6 class="title-tags">Skills required:</h6>
                                <ul class="tags list-inline">
                                    <li><a href="#">Javascript</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">Presta</a></li>
                                    <li><a href="#">Sass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="listing-tabs">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> email@mail.com</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> 012 345 678</a></li>
                                <li><a href="#"><i class="fa fa-globe"></i> www.webstite.com</a></li>
                                <li class="share-button">
                                    <a href="#"><i class="fa fa-share"></i> Share</a>
                                    <div class="contact-share">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="listing-ver-3">
                        <div class="listing-heading">
                            <h5>Senior Interaction Designer</h5>
                            <ul class="bookmark list-inline">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                        <div class="listing-inner">
                            <div class="listing-content">
                                <h6 class="title-company">Mars Planet Telecommunications Inc.</h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                    Manhattan, New york, USA
                  </span>
                  <span class="type-work full-time">
                    Full Time
                  </span>
                                <p>Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio pellentesque habitant morbi tristique senectus et netus et malesuada. <a href="single_job.html">read more</a></p>
                                <h6 class="title-tags">Skills required:</h6>
                                <ul class="tags list-inline">
                                    <li><a href="#">Javascript</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">Presta</a></li>
                                    <li><a href="#">Sass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="listing-tabs">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> email@mail.com</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> 012 345 678</a></li>
                                <li><a href="#"><i class="fa fa-globe"></i> www.webstite.com</a></li>
                                <li class="share-button">
                                    <a href="#"><i class="fa fa-share"></i> Share</a>
                                    <div class="contact-share">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="listing-ver-3">
                        <div class="listing-heading">
                            <h5>WordPress Design Contractor</h5>
                            <ul class="bookmark list-inline">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                        <div class="listing-inner">
                            <div class="listing-content">
                                <h6 class="title-company">Mars Planet Telecommunications Inc.</h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                    Manhattan, New york, USA
                  </span>
                  <span class="type-work full-time">
                    Full Time
                  </span>
                                <p>Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio pellentesque habitant morbi tristique senectus et netus et malesuada. <a href="single_job.html">read more</a></p>
                                <h6 class="title-tags">Skills required:</h6>
                                <ul class="tags list-inline">
                                    <li><a href="#">Javascript</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">Presta</a></li>
                                    <li><a href="#">Sass</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="listing-tabs">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> email@mail.com</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> 012 345 678</a></li>
                                <li><a href="#"><i class="fa fa-globe"></i> www.webstite.com</a></li>
                                <li class="share-button">
                                    <a href="#"><i class="fa fa-share"></i> Share</a>
                                    <div class="contact-share">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
                                <option value="1">Spa</option>
                                <option value="2">Cinema</option>
                            </select>
                        </div>
                        <div class="location">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" placeholder="Location">
                        </div>
                    </div>
                    <div class="sidebar-categories">
                        <h6>Categories</h6>
                        <ul>
                            <li>
                                <input type="checkbox">
                                <span class="title">Cinema</span>
                                <span class="count">5</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Massage Parlor</span>
                                <span class="count">4</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Hairdresser</span>
                                <span class="count">3</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Car Repair</span>
                                <span class="count">3</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Laundry</span>
                                <span class="count">3</span>
                            </li>
                            <li>
                                <input type="checkbox">
                                <span class="title">Finance and legal</span>
                                <span class="count">3</span>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-scrollbars">
                        <h6>Date Posted:</h6>
                        <div class="slider-range-container">
                            <div class="slider-range" data-min="1" data-max="60" data-step="2" data-default-min="10" data-default-max="50" data-currency="&nbsp;"></div>
                            <div class="clearfix">
                                <input type="text" class="range-from" value="1">
                                <input type="text" class="range-to" value="60">
                            </div>
                        </div>
                        <h6 class="margin-top-50">Salary Range:</h6>
                        <div class="slider-range-container">
                            <div class="slider-range" data-min="1" data-max="10000" data-step="2" data-default-min="500" data-default-max="8000" data-currency="$"></div>
                            <div class="clearfix">
                                <input type="text" class="range-from" value="1">
                                <input type="text" class="range-to" value="60">
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-button">
                        <button class="btn-medium btn-primary full-width">Filter Results</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9 text-right">
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