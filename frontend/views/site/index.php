<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;
$this->title = 'My HHIS';
?>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <!--banner-->
    <section id="banner" class="banner">
        <div class="bg-color">
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="col-md-12">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 120px; margin-top: -16px;"></a>

                    </div>
                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="#banner">Home</a></li>
                        <li class=""><a href="#testimonial">Search History</a></li>
                           <li class=""><a href="#artikel">Artikel</a></li>
                        <li class=""><a href="#service" >About</a></li>

                        <li class=""><a href="#contact">Contact</a></li>
                      </ul>
                    </div>
                </div>
              </div>
            </nav>
            <div class="container">
                <div class="row">

                  <?php
                   if($errorM!=null){
                   ?>

                  <div class="col-md-12">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <p>SIP salah / tidak terdaftar</p>
                      </div>
                    </div>
                  </div>

                  <?php    } ?>
                    <div class="banner-info">
                        <div class="banner-logo text-center">
                          <img src="<?php echo Url::to('@web/img/hhis.png'); ?>" class="img-responsive logo" style="width: 40%">

                        </div>
                        <div class="banner-text text-center">
                            <h1 class="white">find your health history!!</h1>
                            <p>help you to find and record your health history</p>
                            <a href="#contact" class="btn btn-appoint">Login a Doctor</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ banner-->

         <!--testimonial-->
    <section id="testimonial" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ser-title">Search Your Health History</h2>
                    <hr class="botm-line">
                </div>
                <div class="col-md-8">

                    <?php  echo $this->render('/pasien/_search', ['model' => $searchModel]); ?>


                </div>


            </div>
        </div>
    </section>
    <!--/ testimonial-->

    <!--artikel-->
<section id="artikel" class="section-padding">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <h2 class="ser-title">Article</h2>
               <hr class="botm-line">
           </div>
           <?php
          //  $query = new \yii\db\Query();
          //  $data = $query->select(['judul','abstrak','id_artikel'])
          //  ->from('artikel')
          //  ->all();
           foreach($showArtikel as $key=>$value){
             ?>
               <div class="col-md-4" style="margin-top : 2%">
                 <div class="panel panel-success" style="text-align:center">
                   <div class="panel-heading">
                      <h3 class="panel-title"><?php echo $value['judul'] ; ?></h3>
                  </div>
                  <div class="panel-body">
                    <?php echo $value['abstrak'];?>...<?= Html::a('<span class="glyphicon glyphicon-eye-open" style="color:orange"></span>',['viewarticle','id' => $value['id_artikel']],['class' => 'circle btn btn-succes']) ?>

                  </div>
            </div>
           </div>
              <?php }
              ?>

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
</section>
<!--/ artikell-->




        <!--service-->
    <section id="service" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <h2 class="ser-title">Who Are We ?</h2>
                    <hr class="botm-line">
                    <p>
Health History Information System (HHIS) will help you to find and record your medical history, HHIS help doctors to find information on the patient's medical history.</p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="icon-info">
                            <h4>Search Health History</h4>
                            <p>find your disease history just by input your number KTP.</p>
                        </div>
                    </div>
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="icon-info">
                            <h4>Chatting with other doctors</h4>
                            <p>connected the doctor in Indonesia to share knowledge about healthy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="icon-info">
                            <h4>Record Health History</h4>
                            <p>
Help noted your disease history.</p>
                        </div>
                    </div>
                    <div class="service-info">
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="icon-info">
                            <h4>Article</h4>
                            <p>share healthy information and prevent the disease.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/ service-->
    <!--contact-->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ser-title">Contact us</h2>
                    <hr class="botm-line">
                </div>
                <div class="col-md-4 col-sm-4">
                  <h3>Contact Info</h3>
                  <div class="space"></div>
                  <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Informatics Engineering<br>
                    EEPIS</p>
                  <div class="space"></div>
                  <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@hhis.com</p>
                  <div class="space"></div>
                  <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+1 800 123 1234</p>
                </div>
                <div class="col-md-8 col-sm-8 marb20">
<!--                    navvv-->

                    <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Register</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Login</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Admin</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="contact-info">
                            <h3 class="cnt-ttl">For Doctor Register here!!</h3>
                            <div class="space"></div>
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
                            <div class="dokter-form">
                              <?php
                               if($errorMess!=null || $errorM!=null){
                               ?>
                                 <?php $form = ActiveForm::begin(['action' => 'create', 'method' => 'POST']); ?>
                               <?php }
                               else{?>
                                   <?php $form = ActiveForm::begin(['action' => 'index.php/dokter/create', 'method' => 'POST']); ?>
                             <?php
                           } ?>

                                <?= $form->field($model, 'id_no_izin')->textInput() ?>

                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'alamat_rumah')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'alamat_praktik')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'nama_dokter')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton($model->isNewRecord ? 'Register' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                    </div>

      </div>
  <div role="tabpanel" class="tab-pane fade" id="profile">
        <div class="contact-info">
                            <h3 class="cnt-ttl">For Doctor Login here!!</h3>
                            <div class="space"></div>
                            <?php
                             if($errorMess!=null || $errorM!=null){
                             ?>
                                <?php $form = ActiveForm::begin(['id' => 'login-form','action' => '/hhis/frontend/web/index.php/site/login', 'method' => 'POST']); ?>
                             <?php }
                             else{?>
                                  <?php $form = ActiveForm::begin(['id' => 'login-form','action' => 'index.php/site/login', 'method' => 'POST']); ?>
                           <?php
                         } ?>

                            <?= $form->field($modellogin, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($modellogin, 'password')->passwordInput() ?>

                            <?= $form->field($modellogin, 'rememberMe')->checkbox() ?>

                            <div class="form-group">
                              <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
          </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="messages">
          <h3 class="cnt-ttl">Are You Administrator ? </h3>

          <?= Html::a('Login Admin', Url::to('/hhis/backend/web/'), ['class' => 'btn btn-form']) ?>

      </div>

</div>

</div>

<!--                    navv-->


                </div>
            </div>
        </div>
    </section>
    <!--/ contact-->
