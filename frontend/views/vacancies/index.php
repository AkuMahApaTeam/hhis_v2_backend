<?php
$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .headernav {
        height: 70px;
        border-bottom: 1px solid #c9cccd;
    }

    .avt {
        margin-top: 16px;
        height: 38px;
    }
</style>
<div class="search-form">
    <div class="company-banner has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/company-banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>HeadHunters are<br> Hunting for talent</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="advanced-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Cost</label>
                            </div>
                            <div class="col-md-9 col-sm-9 col-sm-9">
                                <div class="slider-range-container">
                                    <div class="slider-range" data-min="1" data-max="10000" data-step="2"
                                         data-default-min="500" data-default-max="8000" data-currency="$"></div>
                                    <div class="clearfix">
                                        <input type="text" class="range-from" value="1">
                                        <input type="text" class="range-to" value="60">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Rating</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="slider-range-container">
                                    <div class="slider-range" data-min="1" data-max="6" data-step="1"
                                         data-default-min="1" data-default-max="6" data-currency=" &nbsp; "></div>
                                    <div class="clearfix">
                                        <input type="text" class="range-from" value="1">
                                        <input type="text" class="range-to" value="6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Days published</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="slider-range-container">
                                    <div class="slider-range" data-min="1" data-max="30" data-step="1"
                                         data-default-min="4" data-default-max="10" data-currency=" &nbsp; "></div>
                                    <div class="clearfix">
                                        <input type="text" class="range-from" value="2">
                                        <input type="text" class="range-to" value="30">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Location</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" placeholder="Switzerland">
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Keywords</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" placeholder="Freelance">
                            </div>
                        </div>
                    </div>
                    <div class="search-category">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <label>Industry</label>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="custom-select-box">
                                    <select name="industry" class="custom-select">
                                        <option value="0">IT</option>
                                        <option value="1">Hobby</option>
                                        <option value="2">Sport</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        <?php if (Yii::$app->user->isGuest) {
                            echo "List Jobs";
                        } else { ?>
                            <a href="<?= Yii::$app->request->baseUrl ?>/vacancies/create">
                                <button class="btn btn-primary">Create New Job</button>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content company-content has-bg-image" data-bg-color="f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="listing listing-1">
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
            <div class="col-md-3">
                <form method="post">
                <div class="sidebar">

                    <div class="sidebar-fields">
                        <div class="custom-select-box">
                            <?=
                            \dosamigos\selectize\SelectizeTextInput::widget([
                                'name' => 'selected_skill',
                                'id' => 'selected_skill',
                                'loadUrl' => ['vacancies/list'],
                                'options' => ['class' => 'form-control', 'placeholder' => 'Pilih Skill'],
                                'clientOptions' => [
                                    'plugins' => ['remove_button'],
                                    'valueField' => 'id',
                                    'labelField' => 'name',
                                    'searchField' => ['name'],
                                    'create' => false,
                                ]
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="sidebar-button">
                        <?= \yii\helpers\Html::input('submit', 'cari', 'Filter Jobs', [
                            'class' => 'btn btn-info btn-block',
                        ]) ?>
                    </div>
                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
