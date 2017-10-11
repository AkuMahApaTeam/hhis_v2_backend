<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
$this->title = 'Data Pasien';
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
      <div class="col-md-12" style="margin-top:30px">
        <?php
        $data2=$dataProvider->getModels();
          echo '<h4 style ="text-align:center">DATA PASIEN</h4>';

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
    <div class="row" style="margin-top:30px">
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
                  echo '<td>'?>

                      <?= Html::a('<span class="glyphicon glyphicon-print" aria-hidden="true"></span>',['pdf','id_riwayat'=> $value['id_riwayat'],'id_pasien'=> $data2[0]->id_pasien],['class' => 'circle btn btn-success']) ?>

                <?php  '</td>';

                  echo '</tr>';
                  echo '</table>';
                  echo '</div>';
                 }
         ?>
         <?php
         }else{
         ?>
         <div class="row">
           <div class="col-md-12">
             <div class="panel panel-danger">
               <div class="panel-heading">maaf anda belum terdaftar sebagai pasien pada sistem ini, pergi ke dokter untuk mendaftarkan diri anda</div>
             </div>
             </div>
         </div>
         <?php } ?>
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

  </div>


  </body>
 </html>
