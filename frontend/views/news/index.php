<?php
?>
<div class="subheader subheader-v2 has-bg-image"
     data-bg-image="<?= Yii::$app->request->baseUrl . '/' ?>img/donation.jpg" style="padding: 0">
    <div class="container" style="background-color: rgba(0,0,0,0.4); width: 100%; height: 150px">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top: 15px;">
                <h1 class="block-title">
                    News</h1>
            </div>
        </div>
    </div>
</div>
<div class="main-content content-business has-bg-image" data-bg-color="f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="listing listing-3">
                    <div class="row">
                        <?=
                        \yii\widgets\ListView::widget(['dataProvider' => $dataProvider,
                            'layout' => "{items}\n{pager}",
                            'options' => [
                                'tag' => 'div',
                                'class' => 'list-wrapper',
                                'id' => 'list-wrapper',
                            ],

                            'itemView' => function ($model) {
                                return $this->render('_list_item', ['model' => $model]);
                            },
                        ]);
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>