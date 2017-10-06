<?php
 use yii\helpers\Url;
 ?>
<html>
<head>
  <style>
  .tab{
    margin: auto;
  }
  .logo2{
    margin: auto;
  }
  </style>
</head>
<body>
  <header>
      <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 200px; margin-top:-45px;margin-left:-40px">
  </header>

  <div class="row" style="text-align:center">

    <h4 style="text-align:center">DOKUMEN RIWAYAT PENYAKIT</h4>
    <h5 style="text-align:center">PSYSICAL ASSASSMENT</h5>
    <?php
    foreach ($dataDokter as $key => $value) {?>
      <table class="tab">
        <tr>
          <td><b>Dokter</b></td>
          <td>:</td>
          <td><p><?php echo $value['nama_dokter'] ?></p></td>
          <td><b>SIP</b></td>
          <td>:</td>
          <td>
            <?php
                  foreach ($dataSIP as $key => $valueS) {
                    $SIP =  $valueS['no_izin'];
                  }

            ?>
            <p><?php echo $SIP ?></p>

          </td>
          <td><b>Alamat</b></td>
          <td>:</td>
          <td><p><?php echo $value['alamat_praktik'] ?></p></td>
            <td><b>Telp</b></td>
              <td>:</td>
              <td><p><?php echo $value['no_telp'] ?></p></td>

        </tr>
      </table>


  </div>
  <hr style="height:3px;color:black">
  <hr style="width:90%;margin-top:-10px;color:black">
  <?php
  }
   ?>
   <div class="row">
     <?php foreach ($dataRiwayat as $key => $valueR): ?>
       <p>tanggal periksa : <?php echo $valueR['tgl_periksa'] ?></p>
     <?php endforeach; ?>
     <h4>Biodata Pasien</h4>
     <?php foreach ($dataPasien as $key => $valueP){?>
     <table>
       <tr>
       <td><p>1.</p></td>
       <td><p>Nama</p></td>
       <td>:</td>
       <td><p><?php echo $valueP['nama_pasien'] ?></p></td>
     </tr>
     <tr>
     <td><p>2.</p></td>
     <td><p>Umur</p></td>
     <td>:</td>
     <?php foreach ($dataRiwayat as $key => $valueR): ?>
       <td><p><?php echo $valueR['umur'] ?></p></td>
     <?php endforeach; ?>

   </tr>
   <tr>
   <td><p>3.</p></td>
   <td><p>Jenis Kelamin</p></td>
   <td>:</td>
   <td><p><?php echo $valueP['jenis_kelamin'] ?></p></td>
 </tr>
<tr>
<td><p>4.</p></td>
<td><p>Golongan Darah</p></td>
<td>:</td>
<td><p><?php echo $valueP['gol_darah'] ?></p></td>
</tr>
<tr>
<td><p>5.</p></td>
<td><p>Berat Badan</p></td>
<td>:</td>
<?php foreach ($dataRiwayat as $key => $valueR): ?>
  <td><p><?php echo $valueR['berat_badan'] ?></p></td>
</tr>
<tr>
<td><p>6.</p></td>
<td><p>Tinggi Badan</p></td>
<td>:</td>
<td><p><?php echo $valueR['tinggi_badan'] ?></p></td>
<?php endforeach; ?>
</tr>
<tr>
<td><p>7.</p></td>
<td><p>Alamat</p></td>
<td>:</td>
<td><p><?php echo $valueP['alamat'] ?></p></td>
</tr>
<tr>
<td><p>8.</p></td>
<td><p>No Telp</p></td>
<td>:</td>
<td><p><?php echo $valueP['no_telp_pasien'] ?></p></td>
</tr>

     </table>
     <?php }?>
     <h4>Anamnese</h4>
     <table>
       <?php foreach ($dataRiwayat as $key => $valueR): ?>
         <tr>
           <td>1.</td>
           <td>Diagnosa Medis</td>
           <td>:</td>
           <td><p>
             <?php echo $valueR['diagnosa'] ?>
           </p>
           </td>
         </tr>
         <tr>
           <td>2.</td>
           <td>Keluhan</td>
           <td>:</td>
           <td><p>
             <?php echo $valueR['keluhan_utama'] ?>
           </p>
           </td>
         </tr>
         <tr>
           <td>3.</td>
           <td>Riwayat Kesehatan Keluarga</td>
           <td>:</td>
           <td><p>
             <?php echo $valueR['riwayat_kesehatan_keluarga'] ?>
           </p>
           </td>
         </tr>
         <tr>
           <td>4.</td>
           <td>Larangan</td>
           <td>:</td>
           <td><p>
             <?php echo $valueR['larangan'] ?>
           </p>
           </td>
         </tr>
         <tr>
           <td>5.</td>
           <td>Jenis Perawatan</td>
           <td>:</td>
           <td><p>
             <?php echo $valueR['perawatan'] ?>
           </p>
           </td>
         </tr>
         <tr>
           <td>6.</td>
           <td>Catatan</td>
           <td>:</td>
           <td><p>
             <?php echo $valueR['note'] ?>
           </p>
           </td>
         </tr>
       <?php endforeach; ?>
     </table>
   </div>
   <footer style="text-align:center">
     <hr style="height:5px">
            <i style="margin-top:-10px;font-size:12px">© Copyright Health History Information System. All Rights Reserved</i>
   </footer>
</body>
</html>
