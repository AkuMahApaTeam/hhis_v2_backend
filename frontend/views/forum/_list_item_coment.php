<?php $mhss = \frontend\models\Mahasiswa::find()->where(['id'=> $model->id_mahasiswa])->one() ?>
<div class="post">
    <div class="topwrap">
        <div class="userinfo pull-left">
            <div class="avatar">
                <img src="<?= Yii::$app->request->baseUrl ?>/uploads/mhs/<?= $mhss->foto ?>" alt=""/>

                <div class="status red">&nbsp;</div>
            </div>

            <div class="icons">
                <img src="images/icon3.jpg" alt=""/><img src="images/icon4.jpg" alt=""/><img
                    src="images/icon5.jpg" alt=""/><img src="images/icon6.jpg" alt=""/>
            </div>
        </div>
        <div class="posttext pull-left">
            <p><?= $model->isi_komentar ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="postinfobot">
        <div class="likeblock pull-left">
            Comment By <?= $mhss->nama_lengkap ?>
        </div>
        <div class="next pull-right">
            <i class="fa fa-clock-o"></i> Comment on : <?= $model->tanggal ?>
        </div>

        <div class="clearfix"></div>
    </div>
</div><!-- POST -->