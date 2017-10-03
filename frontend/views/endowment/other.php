<?php
use yii\grid\GridView;
$this->title = 'Other';
?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
])
?>