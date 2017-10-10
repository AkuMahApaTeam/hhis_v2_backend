<div class="col-md-4">
    <div class="listing-grid listing-grid-1">
        <div class="listing-heading">
            <h5>
                <a href="<?= Yii::$app->request->baseUrl . '/news/detail?id=' . $model->id ?>"><?= $model->judul ?></a>
            </h5>
        </div>
        <div class="listing-inner">
            <div class="flexslider default-slider">
                <ul class="slides" style="height: 350px;">
                    <li>
                        <img
                            src="<?= Yii::$app->request->baseUrl . '/uploads/berita/' . $model->gambar ?>"
                            alt="">

                    </li>
                </ul>
                <div class="reviews">
                    <ul>
                    </ul>
                    <span class="count"></span>
                </div>
            </div>
            <ul class="uou-accordions">
                <li class="active">
                    <a><i class="fa fa-info-circle main-icon"></i> Information</a>

                    <div>
                        <?= substr($model->isi,0,100)." ..." ?>

                    </div>
                </li>

            </ul> <!-- end .uou-accordions -->
            <div class="info-footer">
                <i class="fa fa-clock-o"></i>
                <?php
                $tgl = date_create($model->tanggal);
                $tglhsl = date_format($tgl, "d M Y")
                ?>
                <h6><?= $tglhsl ?></h6>
                <i class="fa fa-bookmark bookmark pull-right"></i>
            </div>
        </div>
    </div>
</div>