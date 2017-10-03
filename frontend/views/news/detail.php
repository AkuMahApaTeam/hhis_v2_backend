<?php
?>
<div class="subheader subheader-v2 has-bg-image"
     data-bg-image="<?= Yii::$app->request->baseUrl . '/' ?>img/donation.jpg" style="padding: 0">
    <div class="container" style="background-color: rgba(0,0,0,0.4); width: 100%; height: 150px">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top: 15px;">
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 10px">

    <div class="row">

        <div class="col-lg-8">
            <h1><?= $model->judul ?></h1>
            <hr>
            <?php
            $tgl = date_create($model->tanggal);
            $hsltgl = date_format($tgl, "F d, Y");
            ?>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $hsltgl ?></p>

            <hr>

            <img class="img-responsive" src="<?= Yii::$app->request->baseUrl . '/uploads/berita/' . $model->gambar ?>"
                 alt="" style="width: 100%;">

            <hr>

            <p class="lead">
                <?= $model->isi ?>
            </p>

            <hr>
        </div>
        <div class="col-md-4">
                <div class="sidebar-listing">
                    <h5 class="sidebar-listing-title">Berita Lainnya</h5>
                    <?php foreach ($randB as $rand) { ?>
                        <div class="listing-offer">

                            <div class="listing-offer-thumbnail">
                                <center>
                                <img src="<?= Yii::$app->request->baseUrl . '/uploads/berita/' . $rand->gambar ?>"
                                     alt="" width="120px"></center>
                            </div>
                            <div class="listing-offer-content">

                                <center><a style="color: black" href="<?= Yii::$app->request->baseUrl.'/news/detail?id='.$rand->id ?>"><?= $rand->judul ?></a> <hr></center>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </div>

</div>