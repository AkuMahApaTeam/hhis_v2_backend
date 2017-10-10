<?php if ($model != NULL) { ?>
        <?php $mhs = \frontend\models\Mahasiswa::find()->where(['id' => $model->id_mahasiswa])->one(); ?>
        <?php $dataFor = \frontend\models\Forum::find()->where(['id' => $model->id_forum])->one(); ?>
        <div class="post">
            <div class="wrap-ut pull-left">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="<?= Yii::$app->request->baseUrl.'/uploads/mhs/'.$mhs->foto ?>" alt=""/>

                        <div class="status green">&nbsp;</div>
                    </div>

                    <div class="icons">
                        <img src="images/icon1.jpg" alt=""/><img src="images/icon4.jpg" alt=""/>
                    </div>
                </div>
                <div class="posttext pull-left">
                    <h2><a href="<?= Yii::$app->request->baseUrl ?>/forum/detail?id=<?= $dataFor->id ?>"><?= $dataFor->judul ?></a></h2>

                    <p><?= substr($dataFor->isi, 0, 200).'...' ?></p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfo pull-left">
                <div class="comments">
                    <div class="">

                        <div class=""></div>
                    </div>

                </div>
                <div class="time"><i class="fa fa-clock-o"></i> <?= $dataFor->tanggal ?></div>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } else {?>
    No Data Found
<?php } ?>