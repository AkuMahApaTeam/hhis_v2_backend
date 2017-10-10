<div class="subheader has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/single-business-header.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="subheader-title">Job Details</h3>
            </div>
        </div>
    </div>
</div>

<div class="main-content single-company-content has-bg-image" data-bg-color="f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="listing listing-1">
                    <div class="listing-ver-3">
                        <div class="listing-heading">
                            <h5><?= $dataLok->judul ?></h5>
                            <ul class="bookmark list-inline">
                                <li><a href="#"><i class="fa fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div>
                        <div class="listing-inner">
                            <div class="listing-content">
                                <h6 class="title-company"><?= $dataLok->nama_kantor ?></h6>
                  <span class="location">
                    <i class="fa fa-map-marker"></i>
                      <?= $dataLok->lokasi ?>
                  </span>
                  <span class="type-work full-time">
                    <?= $dataLok->jenis_karyawan ?>
                  </span>
                                <?= $dataLok->isi ?>
                                <h6 class="title-tags">Skills required:</h6>
                                <ul class="tags list-inline">
                                    <?php
                                    $modelSk = \frontend\models\LokerSkill::find()->where(['loker_id' => $dataLok->id])->all();
                                    foreach ($modelSk as $ModelSkill) { ?>
                                        <li><a href="#"><?= $ModelSkill->category->nama ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="listing-tabs">
                            <ul>
                                <li><a href="#"><i class="fa fa-envelope"></i> <?= $dataLok->email ?></a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> <?= $dataLok->kontak ?></a></li>
                                <li><a href="#"><i class="fa fa-globe"></i> <?= $dataLok->url ?></a></li>
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
                <div class="recruiter-info">
                    <div class="recruiter-header">
                        <h5>About the Recruiter</h5>
                    </div>
                    <div class="recruiter-inner">
                        <div class="row">
                            <div class="col-md-7 col-sm-7 recruiter-personal">
                                <div class="recruiter-thumbnail">
                                    <img src="<?= Yii::$app->request->baseUrl . '/uploads/mhs/' . $dataRecruit->foto ?>"
                                         alt="">
                                </div>
                                <div class="recruiter-details">
                                    <h5 class="name"><?= $dataRecruit->nama_lengkap ?></h5>
                                    <span class="location"><?= $dataRecruit->namaJurusan->nama_jurusan ?></span>
                                    <ul>
                                        <li><span>E-Mail: <?= $dataRecruit->email ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5 recruiter-contact text-right">
                                <ul class="social">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recruiter-info">
                    <div class="recruiter-header">
                        <h5>Suggested Candidate</h5>
                    </div>
                    <?=
                    \yii\widgets\ListView::widget(['dataProvider' => $dataProvider,
                        'layout' => "{items}\n{pager}",
                        'options' => [
                            'tag' => 'div',
                            'class' => 'list-wrapper',
                            'id' => 'list-wrapper',
                        ],

                        'itemView' => function ($model) {
                            return $this->render('_list_item_suggest', ['model' => $model]);
                        },
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>