<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Mahasiswa $model
 */

$this->title = 'Edit Profile';
?>
<div class="giiant-crud mahasiswa-update" <?php
if (stristr($_SERVER['HTTP_USER_AGENT'], "Mobile")) { // if mobile browser
    ?>
    style="padding-left: 20px;padding-right: 20px;padding-top: 25px;"
    <?php
} else { // desktop browser
    ?>

    <?php
}
?>

    <div class="crud-navigation">
    </div>

    <br clear="all"/>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
