<div class="listing-ver-3">
    <div class="listing-heading">
        <h5><?= $model->judul ?></h5>
        <ul class="bookmark list-inline">
            <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
            <li><a href="#"><i class="fa fa-eye"></i></a></li>
            <li><a href="#"><i class="fa fa-share"></i></a></li>
        </ul>
    </div>
    <div class="listing-inner">
        <div class="listing-content">
            <h6 class="title-company"><?= $model->nama_kantor ?></h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                      <?= $model->lokasi ?>
                  </span>
                  <span class="type-work full-time">
                    <?= $model->jenis_karyawan ?>
                  </span>

            <p><?= substr($model->isi, 0, 200).'. . ' ?><a href="<?= Yii::$app->request->baseUrl.'/vacancies/detail?id='.$model->id ?>">read more</a></p>
            <h6 class="title-tags">Skills required:</h6>
            <ul class="tags list-inline">
                <?php
                $modelSk = \frontend\models\LokerSkill::find()->where(['loker_id' => $model->id])->all();
                foreach ($modelSk as $ModelSkill) { ?>
                    <li><a href="#"><?= $ModelSkill->category->nama ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="listing-tabs">
        <ul>
            <li><a href="#"><i class="fa fa-envelope"></i> <?= $model->email ?></a></li>
            <li><a href="#"><i class="fa fa-phone"></i> <?= $model->kontak ?></a></li>
            <li><a href="#"><i class="fa fa-globe"></i> <?= $model->url ?></a></li>
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