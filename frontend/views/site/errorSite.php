<?php
use yii\helpers\Url;
 ?>
<html>
<head>
<style>
.logo{
margin: auto;
}
</style>
</head>
    <body>
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 300px">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-12">
          <ol class="breadcrumb" style="background-color:transparent">
            <li><a href="<?php echo Url::to('@web'); ?>">Home</a></li>
            <li class="active">Data Pasien</li>
          </ol>
        </div>
        <div class="col-md-12">
          <div class="panel panel-danger">
            <div class="panel-heading">maaf anda belum terdaftar sebagai pasien pada sistem ini</div>
          </div>
          </div>
        </div>
      </div>
    </body>
</html>
