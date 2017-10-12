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

   <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-8">
       <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 300px">
     </div>
     <div class="col-md-2"></div>
     <div class="col-md-12">
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
     <div class="col-md-12">
         <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
     </div>
   </div>
   <div class="row">
     <div class="col-md-12">
       <?php
       $data2=$dataProvider->getModels();


         echo '<h4 style ="text-align:center" class="judul">DATA PASIEN</h4>';
         echo '<table class="table">';
         echo '<tr>';
            echo '<td><b>NAMA PASIEN<b></td>';
            echo '<td><b>:<b></td>';
            echo '<td>'.$data2[0]->nama_pasien.'</td>';
         echo '</tr>';
         echo '<tr>';
            echo '<td><b>NIK/KTP<b></td>';
            echo '<td><b>:<b></td>';
            echo '<td>'.$data2[0]->nik.'</td>';
         echo '</tr>';
         echo '<tr>';
            echo '<td><b>GOL DARAH<b></td>';
            echo '<td><b>:<b></td>';
            echo '<td>'.$data2[0]->gol_darah.'</td>';
         echo '</tr>';
         echo '<tr>';
            echo '<td><b>JENIS KELAMIN<b></td>';
            echo '<td><b>:<b></td>';
            echo '<td>'.$data2[0]->jenis_kelamin.'</td>';
         echo '</tr>';
         echo '<tr>';
            echo '<td><b>NO TELP<b></td>';
            echo '<td><b>:<b></td>';
            echo '<td>'.$data2[0]->no_telp_pasien.'</td>';
         echo '</tr>';
         echo '<tr>';
            echo '<td><b>ALAMAT<b></td>';
            echo '<td><b>:<b></td>';
            echo '<td>'.$data2[0]->alamat.'</td>';
         echo '</tr>';
         echo '</table>';
        ?>
     </div>
   </div>
   <div class="row riwayat-index">
     <div class="col-md-12">
       <?php
       echo '<h4 style ="text-align:center">DATA RIWAYAT</h4>';
              if($showRiwayat!=null){
                foreach ($showRiwayat as $key => $value) {
                 echo '<div class="panel panel-info">';
                 echo '<div class="panel-heading">'.$value['tgl_periksa'].'</div>';
                 echo '<table class="table">';
                 echo '<tr>';
                 echo'<th>umur</th>';
                 echo'<th>tinggi badan</th>';
                 echo'<th>berat badan</th>';
                 echo'<th>keluhan utama</th>';
                 echo'<th>riwayat kesehatan keluarga</th>';
                 echo'<th>diagnosa</th>';
                 echo'<th>larangan</th>';
                 echo'<th>catatan tambahan</th>';
                 echo'<th>perawatan</th>';
                 echo'<th>diperiksa oleh</th>';
                 echo'<th>cetak</th>';
                 echo '</tr>';
                 echo '<tr>';
                 echo '<td>'.$value['umur'].'</td>';
                 echo '<td>'.$value['tinggi_badan'].'</td>';
                 echo '<td>'.$value['berat_badan'].'</td>';
                 echo '<td>'.$value['keluhan_utama'].'</td>';
                 echo '<td>'.$value['riwayat_kesehatan_keluarga'].'</td>';
                 echo '<td>'.$value['diagnosa'].'</td>';
                 echo '<td>'.$value['larangan'].'</td>';
                 echo '<td>'.$value['note'].'</td>';
                 echo '<td>'.$value['perawatan'].'</td>';
                 echo '<td>';

                 foreach ($showName as $key => $value1) {
                     echo "".$value1['nama_dokter']."";
                 }
                 echo '</td>';
                 echo '<td>';?>
                   <?= Html::a('<span class="glyphicon glyphicon-print" aria-hidden="true"></span>',['/site/pdf','id_riwayat'=> $value['id_riwayat'],'id_pasien'=> $data2[0]->id_pasien],['class' => 'circle btn btn-success']) ?>
                 <?php echo '</td>';


                 echo '</tr>';
                 echo '</table>';
                 echo '</div>';
                }
        ?>
        <div class="row">
          <div class="col-md-12" style="margin-bottom:50px;text-align:center">
            <?= Html::a('Tambah Riwayat', ['create','id'=>$data2[0]->id_pasien,'username_dokter'=>Yii::$app->user->identity->username], ['class' => 'btn btn-success']) ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php
            echo \yii\widgets\LinkPager::widget([
              'pagination' => $pages,
            ]);
             ?>
          </div>
        </div>


<?php
}else{
?>
<div class="row">
  <div class="col-md-12" style="margin-bottom:50px;text-align:center">
    <?= Html::a('Tambah Riwayat', ['create','id'=>$data2[0]->id_pasien,'username_dokter'=>Yii::$app->user->identity->username], ['class' => 'btn btn-success']) ?>
  </div>
</div>
<?php } ?>

     </div>

   </div>

 </div>


 </body>
</html>
