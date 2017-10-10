<?php
$dataSkil = \frontend\models\MhsSkill::find()->where(['skill_id' => $model->category_id])->one();
$dtMhs = \frontend\models\Mahasiswa::find()->where(['id' => $dataSkil->id_mahasiswa])->one();
?>
<div class="recruiter-inner">
    <div class="row">
        <div class="col-md-7 col-sm-7 recruiter-personal">
            <div class="col-md-3" style="margin: 0; padding: 0">
                <img src="<?= Yii::$app->request->baseUrl.'/uploads/mhs/'.$dtMhs->foto ?>" style="width: 100%" alt="">
            </div>
            <div class="col-md-9">
                <h5 class="name" style="margin: 0"><?= $dtMhs->nama_lengkap ?></h5>
                <span class="location"><?= $dtMhs->kota.', '.$dtMhs->provinsi.', '.$dtMhs->negara ?></span>
                <ul>
                    <?php $fk = \frontend\models\Fakultas::find()->where(['id' => $dtMhs->fakultas])->one(); ?>
                    <?php $jur = \frontend\models\Jurusan::find()->where(['id' => $dtMhs->jurusan])->one(); ?>
                    <li><span><?= $fk->nama_fakultas ?></span></li>
                    <li><span><?= $jur->nama_jurusan ?></span></li>
                    <li><span><?= $dtMhs->email ?></span></li>
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
        <div class="col-md-12">
            <ul class="tags list-inline">
                <br>
                <?php $dts = \frontend\models\MhsSkill::find()->where(['id_mahasiswa' => $dtMhs->id ])->all();
                foreach($dts as $ts){  ?>
                <li style="display: inline; margin-right: 3px;"><a href="#" style="    padding: 3px 10px;
    display: inline-block;
    background: #ededed;
    font-size: 12px;
    color: #999;
    text-transform: uppercase;
    border-radius: 3px;"> <?= $ts->skill->nama?></a></li>
            <?php } ?>
            </ul>
        </div>
    </div>
</div>
<hr>