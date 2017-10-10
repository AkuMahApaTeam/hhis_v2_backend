<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-md-6">
    <div class="listing-ver-6">
        <div class="listing-inner">
            <div class="flexslider default-slider">
                <ul class="slides">
                    <li><img src="<?= Yii::$app->request->baseUrl . '/uploads/mhs/' . $model->foto ?>" alt=""></li>
                </ul>
            </div>
            <div class="listing-content" style="padding-bottom: 0">
                <h6 class="title-company"><i class="fa fa-user"></i> <?= $model->nama_lengkap ?></h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                      <?= $model->kota . ', ' . $model->provinsi ?>
                  </span>
                <ul class="more-info list-inline">
                    <li class="info info-reviews">
                        <ul class="rate list-inline">

                        </ul>
                        <span class="count"></span>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <br/>
                        <br/>
                        <ul class="contact" style="margin: 10px">
                            <li>
                                <i class="fa fa-flag"></i><span><?= $model->namaJurusan->nama_jurusan . ' ' . $model->tahun_masuk ?> </span>
                            </li>
                            <li><i class="fa fa-envelope"></i><span><?= $model->email ?></span>
                            <li><i class="fa fa-home"></i><span><?= $model->alamat ?></span></li>
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="listing-content" style="padding: 10px 15px 10px 15px">
                <h6 class="title-tags" style="display: inline-block">Skill : </h6>
                <ul class="tags list-inline" style="display: inline-block">
                    <?php foreach (\frontend\models\MhsSkill::find()->where(['id_mahasiswa' => $model->id])->all() as $sk) { ?>
                        <li><a href="#"><?= $sk->skill->nama ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="listing-tabs">
            <ul>
                <li><a href="<?= Yii::$app->request->baseUrl.'/alumni-directory/detail?id='.$model->id ?>"><i class="fa fa-file-text-o"></i> View Details</a></li>
            </ul>
        </div>
    </div>
</div>