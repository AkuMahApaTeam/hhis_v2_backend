<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\riwayat\Riwayat */

$this->title = $model->id_riwayat;
$this->params['breadcrumbs'][] = ['label' => 'Riwayats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
   <div class="container-fluid">
<div class="riwayat-view">


  <div class="col-md-12">
    <ol class="breadcrumb" style="background-color:transparent">
      <li><a href="<?php echo Url::to('@web/index.php/riwayat'); ?>">Dokter</a></li>
      <li class="active">Tambah Riwayat</li>
    </ol>
  </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_riwayat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_riwayat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_riwayat',
            'id_pasien',
            'id_dokter',
            'umur',
            'berat_badan',
            'tinggi_badan',
            'riwayat_kesehatan_keluarga:ntext',
            'keluhan_utama:ntext',
            'diagnosa:ntext',
            'larangan:ntext',
            'note:ntext',
            'tgl_periksa',
            'perawatan',
        ],
    ]) ?>

</div>
</div>
