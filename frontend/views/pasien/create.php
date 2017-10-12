<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\riwayat\Riwayat */

$this->title = 'Daftarkan Pasien';

?>
<html>
<head>
  <style>
  .logo{
    margin: auto;
  }
  </style>
  </svg>
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
          <li><a href="<?php echo Url::to('@web/index.php/riwayat'); ?>">Dokter</a></li>
          <li class="active">Daftarkan Pasien</li>
        </ol>
      </div>
    </div>
    <div class="row">

      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="pasien-create">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
                'errorMess' => $errorMess,
            ]) ?>

        </div>

      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</body>
</html>
