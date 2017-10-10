<?php $formatter = Yii::$app->formatter; ?>
<?=
\kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
    'headerRowOptions' => ['class' => 'x'],
    'toolbar' => false,
    'panel' => [
        'type' => \kartik\grid\GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> Rekap Perhitungan Beasiswa Tahun Ajar '. $formatter->asDate($tahun_ajar->awal).' / '.$formatter->asDate($tahun_ajar->akhir),
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'mitra_aktif',
            'label' => 'Mitra Aktif',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
            'value' => function($model) {
                return $model->mitra_aktif.' Mitra';
            }
        ],
        [
            'attribute' => 'total_dana',
            'label' => 'Total Dana',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
            'value' => function($model) {
                return Yii::$app->runAction('kegiatan/rupiah', ['nilai' => $model->total_dana]);
            }
        ],
        [
            'attribute' => 'total_kuota',
            'label' => 'Beasiswa Tersedia',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
        ],
        [
            'attribute' => 'total_perhitungan',
            'label' => 'Kuota Terhitung',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
        ],
        [
            'attribute' => 'sisa',
            'label' => 'Kuota Tersisa',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
            'value' => function($model) {
                if ($model->total_kuota < $model->total_perhitungan) {
                    return 0;
                } else {
                    return $model->total_kuota - $model->total_perhitungan;
                }
            },
        ],
        [
            'attribute' => 'total_diambil',
            'label' => 'Kuota Diambil',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
        ],
        [
            'attribute' => 'total_request',
            'label' => 'Kuota Request',
            'hAlign' => \kartik\grid\GridView::ALIGN_CENTER,
        ],
    ],
]);

?>