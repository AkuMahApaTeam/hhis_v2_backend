<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\pasien\Pasien */

$this->title = $model->id_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-view">

  <div class="col-md-12">
    <ol class="breadcrumb" style="background-color:transparent">
      <li><a href="<?php echo Url::to('@web/index.php/riwayat'); ?>">Dokter</a></li>
      <li class="active">Daftarkan Paien</li>
    </ol>
  </div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pasien], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pasien], [
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
            'id_pasien',
            'nama_pasien',
            'alamat',
            'no_telp_pasien',
            'gol_darah',
            'jenis_kelamin',
            'nik',
        ],
    ]) ?>

</div>
