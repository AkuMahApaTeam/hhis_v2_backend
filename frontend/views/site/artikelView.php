<?php
use yii\helpers\Url;


$this->title = 'Artikel';
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
      <?php
      foreach ($data as $key => $value) {?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 300px">
            </div>
            <div class="col-md-12">
              <ol class="breadcrumb" style="background-color:transparent">
                <li><a href="<?php echo Url::to('@web'); ?>">Home</a></li>
                <li class="active">Artikel</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="text-align:center">
              <h3><?php echo $value['judul'] ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $value['deskripsi'] ?>
            </div>
          </div>
        </div>
      <?php
    }
       ?>
    </body>
</html>
