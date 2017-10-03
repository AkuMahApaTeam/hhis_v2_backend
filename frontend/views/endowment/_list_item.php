 <style>
 p{
     height:auto!important;
 }
 </style>
    <div class="col-md-12">
        <div class="listing listing-1">
            <div class="listing-ver-1">
                <div class="listing-heading">
                    <h5><a href="single_business.html"><?= $model->judul ?></a></h5>
                    <a href="#"><i class="fa fa-bookmark"></i></a>
                </div>
                <div class="tab-content">
                    <div id="basic" class="tab-pane fade in active basic">
                        <div class="listing-inner">
                            <div class="flexslider default-slider">
                                <ul class="slides">
                                    <li><img
                                            src="<?= Yii::$app->request->baseUrl . '/uploads/event/' ?><?= $model->gambar ?>"
                                            alt=""></li>
                                </ul>
                            </div>
                            <?php
                            if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
                                ?>
                                <hr>
                                <?php
                            } else { // desktop browser
                                ?>

                                <?php
                            }
                            ?>

                            <div class="listing-content">
                      <span class="location">
                        <i class="fa fa-map-marker"></i> Surabaya, Indonesia
                      </span>

                                <p>
                                    <?= $model->isi ?>
                                </p>
                                <h6 class="title-tags">Donation:</h6>
                                <a href="<?= Yii::$app->request->baseUrl . '/endowment/eventa?id=' . $model->id ?>"
                                   class="btna btn-primary"
                                   onclick="return confirm('Apakah anda setuju?')">Rp. 5.000</a>

                                <a href="<?= Yii::$app->request->baseUrl . '/endowment/eventb?id=' . $model->id ?>"
                                   class="btna btn-primary"
                                   onclick="return confirm('Apakah anda setuju?')">Rp. 10.000</a>

                                <a href="<?= Yii::$app->request->baseUrl . '/endowment/eventc?id=' . $model->id ?>"
                                   class="btna btn-primary"
                                   onclick="return confirm('Apakah anda setuju?')">Rp. 20.000</a>

                                <a href="<?= Yii::$app->request->baseUrl . '/endowment/eventd?id=' . $model->id ?>"
                                   class="btna btn-primary"
                                   onclick="return confirm('Apakah anda setuju?')">Rp. 50.000</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>