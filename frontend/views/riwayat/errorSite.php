<?php
use yii\helpers\Url;
use yii\helpers\Html;
 ?>
<html>
<head>
<style>
.bakgron{
     position: fixed;
    z-index: -10;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-image: -webkit-linear-gradient(top,rgba(0,0,0,0.8),rgba(0,0,0,0.6)),url('<?php echo Url::to('@web/img/bac4.jpg'); ?>');
    margin: 0px;
    /*            mozila*/
         background-image: -moz-linear-gradient(top,rgba(0,0,0,0.8),rgba(0,0,0,0.6)),url('<?php echo Url::to('@web/img/bac4.jpg'); ?>');
        margin: 0px;


}
.logo{
margin: auto;
}
</style>
</head>
    <body>
      <div class="row bakgron">

           </div>
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 300px">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-12">
          <ol class="breadcrumb" style="background-color:transparent">
            <li><a href="<?php echo Url::to('@web/index.php/riwayat'); ?>">Dokter</a></li>
            <li class="active">Data Pasien</li>
            <li class="active">
            <button class=" dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:transparent;border:0px">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <?php echo  Yii::$app->user->identity->username; ?>
              <span class="caret"></span>
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li>
                <?= Html::a(
                    'Sign out',
                    ['/site/logout'],
                    ['data-method' => 'post']
                ) ?>
              </li>

            </ul>
          </li>
          </ol>
        </div>
        <div class="col-md-12">
          <div class="panel panel-danger">
            <div class="panel-heading">maaf anda belum terdaftar sebagai pasien pada sistem ini</div>
          </div>
          </div>
          <div class="col-md-12" style="margin-bottom:50px;text-align:center">
                <?= Html::a('Daftarkan Pasien', ['/pasien/create'], ['class' => 'btn btn-success']) ?>
          </div>
        </div>
      </div>
    </body>
</html>
