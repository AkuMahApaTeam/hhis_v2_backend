<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\riwayat\RiwayatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayats';
$this->params['breadcrumbs'][] = $this->title;
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
    .judul{
      color: whitesmoke;
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

   <div class="row" style="margin-bottom:10%">
     <div class="col-md-2"></div>
     <div class="col-md-8">
       <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 300px">
     </div>
     <div class="col-md-2"></div>
     <div class="col-md-12">
        <div class="dropdown">
       <ol class="breadcrumb" style="background-color:transparent">
         <li><a href="<?php echo Url::to('@web'); ?>">Home</a></li>
         <li class="active">Dokter</li>
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
     </div>
     <div class="col-md-12">
         <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
     </div>
     <?php
      if($errorMess!=null){
      ?>
      <div class="col-md-2"></div>
     <div class="col-md-8">
       <div class="panel panel-danger">
         <div class="panel-heading">
           <?php

           foreach ($errorMess as $key => $value4) {
             echo $value4['0'];
           }

            ?>
         </div>
       </div>
     </div>
     <div class="col-md-2"></div>
     <?php    } ?>
   </div>



 </div>


 </body>
</html>
