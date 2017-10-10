<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
if (Yii::$app->controller->id == 'profile') {
    $containerClass = 'restaurant';
} elseif (Yii::$app->controller->id == 'vacancies') {
    $containerClass = 'jobs';

} elseif (Yii::$app->controller->id == 'alumni-directory') {
    $containerClass = 'restaurant';
} elseif (Yii::$app->controller->id == 'volunteer') {
    $containerClass = 'jobs';
} else {
    $containerClass = 'homepage';
};
?>

<div id="main-wrapper" class="<?= $containerClass ?>">
    <?= $this->render('navbar') ?>
    <?= $content ?>
    <?= $this->render('footer') ?>
    <?php $this->endBody() ?>
</div>
<?php
if (Yii::$app->controller->id == 'profile') {
    $sc = "<script>
    var addressPicker = new AddressPicker({
        map: {
            id: '#maps',
        },
    });
    $('#mahasiswa-alamat').typeahead(null, {
        displayKey: 'description',
        source: addressPicker.ttAdapter()
    });
    $('#mahasiswa-alamat').bind(\"typeahead:selected\", addressPicker.updateMap);
    $('#mahasiswa-alamat').bind(\"typeahead:cursorchanged\", addressPicker.updateMap);

    addressPicker.bindDefaultTypeaheadEvent($('#mahasiswa-alamat'));
    $(addressPicker).on('addresspicker:selected', function (event, result) {
        $('#mahasiswa-lat').val(result.lat());
        $('#mahasiswa-lng').val(result.lng());
        $('#mahasiswa-kota').val(result.nameForType('administrative_area_level_2'));
        $('#mahasiswa-provinsi').val(result.nameForType('administrative_area_level_1'));
        $('#mahasiswa-negara').val(result.nameForType('country'));
        });
</script>";
} else {
    $sc = "";
}
?>
</body>
<?= $sc ?>
</html>
<?php $this->endPage() ?>
