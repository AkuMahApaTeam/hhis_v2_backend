<div class="subheader subheader-v2 has-bg-image"
     data-bg-image="<?= Yii::$app->request->baseUrl . '/' ?>img/donation.jpg" style="padding: 0">
    <div class="container" style="background-color: rgba(0,0,0,0.4); width: 100%; height: 150px">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top: 15px;">
                <h1 class="block-title">
                    Thank You</h1>
            </div>
        </div>
    </div>
</div>
<div class="team">
    <div class="container pb30">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 product">
                <div class="lg-margin visible-sm visible-xs"></div><!-- Space -->
                <h1 class="product-name">Donasi Event </h1>
                <ul class="product-list"
                    <?php
                    if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
                        ?>
                        style="padding-left: 0px;"
                        <?php
                    } else { // desktop browser
                        ?>

                        <?php
                    }
                    ?>
                >
                    <table>
                        <tbody>
                        <tr>
                            <td>Event</td>
                            <td>:&nbsp;</td>
                            <td><?= $model->ev->judul ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:&nbsp;</td>
                            <td><?= $model->namaMhs->nama_lengkap ?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>:&nbsp;</td>
                            <td><?= $model->namaMhs->email ?></td>
                        </tr>
                        <tr>
                            <td><font color="#e74c3c">Poin saat ini&nbsp;</font></td>
                            <td><font color="#e74c3c">:&nbsp;</font></td>
                            <td><font color="#e74c3c"><?= \app\components\Angka::toReadableAngka($poin, TRUE); ?></font></td>
                        </tr>
                        </tbody>
                    </table>
                </ul>
                <form id="donasi">
                    <div class="product-color-filter-container">
                        <h1 class="product-name">Informasi Transfer </h1>
                        <center>Terima kasih, Anda telah memilih Donasi Rutin Bulanan</center><br/>
                        <center>
                            <div style="background-color: #f1c40f; height: 80px; width: 250px">
                                Jumlah yang harus dibayar
                                <br>
                                <?= "<strong>".'Rp '.\app\components\Angka::toReadableAngka($model->jumlah, FALSE)."</strong>"; ?>
                            </div>
                        </center>
                        <br>
                        <br>
                        1. Transfer sejumlah <strong><?='Rp '.\app\components\Angka::toReadableAngka($model->jumlah, FALSE) ?></strong> ke salah satu nomor rekening Alumni ITS di bawah ini :
                        <br>
                        <div class="team">
                            <div class="container pb30">
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-sm-3" style="border: 1px;border-style: dotted;">
                                        <div class="uou-block-6a">
                                            <img src="<?= Yii::$app->request->baseUrl ?>/img/bca.png" alt=""
                                                 style="width: 150px;height: 50px;margin-top: 2px;">
                                        </div>
                                        <center><strong>Bank BCA, Kampus ITS</strong>
                                            <br>
                                            Nomor Rekening :
                                            <br>
                                            <strong>098 223 4512</strong>
                                            <br>
                                            a.n. AlumniITS
                                        </center>
                                    </div>
                                    <div class="col-sm-3" style="border: 1px;border-style: dotted;">
                                        <div class="uou-block-6a">
                                            <img src="<?= Yii::$app->request->baseUrl ?>/img/mandiri.png" alt=""
                                                 style="width: 150px;height: 50px; margin-top: 2px;">
                                        </div> <!-- end .uou-block-6a -->
                                        <center><strong>Bank Mandiri, Kampus ITS</strong>
                                            <br>
                                            Nomor Rekening :
                                            <br>
                                            <strong>0984 223 451 243</strong>
                                            <br>
                                            a.n. AlumniITS
                                        </center>
                                    </div>

                                    <div class="col-sm-3" style="border: 1px;border-style: dotted;">
                                        <div class="uou-block-6a">
                                            <img src="<?= Yii::$app->request->baseUrl ?>/img/bni.png" alt=""
                                                 style="width: 150px;height: 50px; margin-top: 2px;">
                                        </div> <!-- end .uou-block-6a -->
                                        <center><strong>Bank BNI, Kampus ITS</strong>
                                            <br>
                                            Nomor Rekening :
                                            <br>
                                            <strong>223 451 2435</strong>
                                            <br>
                                            a.n. AlumniITS
                                        </center>
                                    </div>

                                    <div class="col-sm-3" style="border: 1px;border-style: dotted;">
                                        <div class="uou-block-6a">
                                            <img src="<?= Yii::$app->request->baseUrl ?>/img/bri.png" alt=""
                                                 style="width: 150px; height: 50px; margin-top: 2px;">

                                        </div> <!-- end .uou-block-6a -->
                                        <center><strong>Bank BRI, Kampus ITS</strong>
                                            <br>
                                            Nomor Rekening :
                                            <br>
                                            <strong>223 451 235 552 235</strong>
                                            <br>
                                            a.n. AlumniITS
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="xs-margin"></div>
                    </div><!-- End .product-color-filter-container-->
                    <hr>

                </form>
                <div class="md-margin"></div><!-- Space -->
                <a href="<?= Yii::$app->request->baseUrl . '/profile' ?>" class="btn btn-primary">Profile</a>
            </div><!-- End .col-md-6 -->
        </div>
    </div>
</div>
<hr>
