<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use diiimonn\widgets\CheckboxMultiple;
use yii\helpers\Url;

$this->title = 'Detail Forum';

?>
<style xmlns="http://www.w3.org/1999/html">
    body {
        font-family: 'Open Sans Light', sans-serif;
        font-size: 14px;
        color: #989c9e;
    }

    a {
        color: #363838;
    }

    a:hover {
        color: #989c9e;
    }

    /*-----------------------------------------------------------------*/
    /*--- Footer ---*/

    footer {
        height: 69px;
        line-height: 69px;
        color: #363838;
    }

    footer .logo {
        line-height: normal;
    }

    ul.socialicons li {
        display: inline-block;
        list-style: none;
        font-size: 18px;
        color: #bdc3c7;
        margin-left: 15px;
    }

    ul.socialicons li a {
        color: #bdc3c7;
    }

    ul.socialicons li a:hover {
        color: #363838;

    }

    /*-----------------------------------------------------------------*/
    /*--- Header ---*/
    .headernav {
        height: 70px;
        border-bottom: 1px solid #c9cccd;
    }

    .content {
        background-color: #ecf0f1;
        border-top: solid 1px #e0e4e5;
    }

    .selecttopic {
        line-height: 69px;
        font-family: 'Open Sans Semibold', sans-serif;
        font-size: 16px;
        color: #363838;
    }

    .selecttopic select {
        border: none;
    }

    .selecttopic .dropdown-menu {
        margin-top: -20px;
    }

    .headernav .search {
        color: #363838;
        font-size: 14px;
        font-family: 'Open Sans Light', sans-serif;
        margin-top: 16px;
        height: 38px
    }

    .headernav .search .wrap {
        background-color: #f3f5f9;
        border-radius: 3px;
    }

    .headernav .search .txt {
        width: 85%;
    }

    .headernav .search input {
        border: none;
        box-shadow: none;
        background-color: #f3f5f9;
        color: #363838;
        font-size: 14px;
        padding: 8px 19px;
        height: 38px;

    }

    .headernav .search button {
        border: solid 1px #697683;
        box-shadow: none;
        background-color: #697683;
        color: #ffffff;
        font-size: 18px;
    }

    /*--- Avatar ---*/
    .avt {
        margin-top: 16px;
        height: 38px;
    }

    .avt button {
        height: 38px;
        border: none;
        box-shadow: none;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Open Sans Bold', sans-serif;
        padding-left: 30px;
        padding-right: 30px;
        background-color: #1abc9c;
    }

    .avt .btn-primary:hover,
    .avt .btn-primary:focus,
    .avt .btn-primary:active,
    .avt .btn-primary.active {
        background-color: #1abc9c;

        border: none;
        box-shadow: none;

    }

    .env {
        font-size: 18px;
        color: #cfd5d7;
        line-height: 38px;
        padding: 0 20px;
    }

    .avatar {
        position: relative;
    }

    .avatar img {
        border-radius: 50%;
    }

    .avatar .status {
        position: absolute;
        right: 0;
        top: 0;
        width: 12px;
        height: 12px;
        line-height: 12px;
        border-radius: 50%;
        border: solid 2px #ffffff;
    }

    .dropdown.avatar .status {
        right: 14px;
    }

    .caretl {
        color: #363838;
        font-size: 14px;
        line-height: 38px;
        padding: 0 15px;
    }

    .avatar .green {
        background-color: #80d3ab;
    }

    .avatar .red {
        background-color: #f27777;
    }

    .avatar .yellow {
        background-color: #ecd346;
    }

    /*-----------------------------------------------------------------*/
    /*--- Content ---*/

    /*--- Pagination ---*/
    .paginationforum li {
        list-style: none;
        display: inline-block;
        margin-left: 20px;
    }

    .paginationforum li a {
        min-width: 24px;
        height: 24px;
        font-size: 14px;
        font-family: 'Open Sans Semibold', sans-serif;
        color: #ffffff;
        background-color: #cfd5d7;
        border-radius: 2px;
        display: block;
        padding: 0 8px;
        line-height: 24px;
    }

    .paginationforum li a.active,
    .paginationforum li a:hover,
    .paginationforum li a:focus,
    .paginationforum li a:active {
        color: #363838;
        background-color: #ffffff;
        box-shadow: 0 1px 2px #c9cccd;
        font-family: 'Open Sans Bold', sans-serif;
        text-decoration: none;

    }

    .paginationforum {
        margin: 19px auto;
        padding: 0;
    }

    .prevnext {
        font-size: 26px;
        color: #cfd5d7;
        margin-top: 11px;
        display: block;
    }

    .prevnext.last {
        margin-left: 20px;
    }

    /*--- Sidebar ---*/

    .sidebarblock {
        background-color: #ffffff;
        border-radius: 2px;
        box-shadow: 0 1px 2px #c9cccd;
        margin-bottom: 20px;
    }

    .sidebarblock h3 {
        color: #363838;
        font-size: 14px;
        font-family: 'Open Sans Bold', sans-serif;
        margin: 0;
        padding: 20px;

    }

    .sidebarblock .divline {
        height: 1px;
        line-height: 1px;
        border-bottom: solid 1px #f1f1f1;
    }

    .sidebarblock .blocktxt {
        padding: 20px;
    }

    ul.cats li {
        list-style: none;
        display: block;
        margin: 0;
        padding: 0;
        line-height: 30px;
    }

    ul.cats {
        margin: 0;
        padding: 0;
    }

    ul.cats li a {
        font-size: 14px;
        color: #363838;
        font-family: 'Open Sans Light', sans-serif;
        line-height: 30px;
    }

    ul.cats .badge {
        background-color: #bdc3c7;
        font-size: 12px;
        color: #ffffff;
        font-family: 'Open Sans Bold', sans-serif;
        margin-top: 7px;
    }

    .sidebarblock .blocktxt {

        font-size: 14px;
        color: #363838;
        font-family: 'Open Sans Light', sans-serif;

    }

    .sidebarblock .blocktxt .smal {
        font-size: 12px;
    }

    .chbox {
        width: 50px;
    }

    table.poll {
        width: 100%;
    }

    .progress-bar.color1 {
        background-color: #9b59b6;
    }

    .progress-bar.color2 {
        background-color: #3498db;
    }

    .progress-bar.color3 {
        background-color: #e67e22;
    }

    .progress-bar {
        font-size: 14px;
        color: #ffffff;
        font-family: 'Open Sans Bold', sans-serif;
        line-height: 31px;
        text-align: left;
        padding-left: 10px;
        box-shadow: none;
    }

    .progress {
        background-color: #ecf0f1;
        height: 31px;
        border-radius: 2px;
        box-shadow: none;
    }

    .poll label {
        margin-bottom: 0;
        margin-left: 20px;
    }

    .poll input[type="radio"] {
        display: none;
    }

    .poll input[type="radio"] + label {
        display: inline-block;
        width: 31px;
        height: 31px;
        background: url(../images/radio.jpg) 0 0 no-repeat;
        vertical-align: middle;
        cursor: pointer;
    }

    .poll input[type="radio"]:checked + label {
        background: url(../images/radio.jpg) -31px 0 no-repeat;
    }

    td.chbox {
        vertical-align: top;
    }

    /*--- Post --*/
    .post {
        background-color: #ffffff;

        border-radius: 2px;
        box-shadow: 0 1px 2px #c9cccd;
        margin-bottom: 20px;
    }

    .post .wrap-ut {
        width: 85%;
    }

    .post .userinfo {
        width: 15%;
        padding: 20px 0 15px 15px;
    }

    .post .posttext {
        width: 85%;
        padding-right: 30px;
        padding-top: 20px;
        padding-bottom: 15px;

        color: #989c9e;
        font-size: 14px;
        font-family: 'Open Sans Light', sans-serif;
        line-height: 25px;
    }

    .post .postinfo {
        width: 15%;
        border-left: solid 1px #f1f1f1;

    }

    .post .avatar {
        width: 37px;
        margin-left: 5px;
    }

    .post .icons {
        width: 48px;
        border-top: solid 1px #f1f1f1;
        margin-top: 12px;
        padding-top: 7px;
    }

    .post h2 {
        color: #363838;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .post .comments {
        border-bottom: solid 1px #f1f1f1;
        padding: 18px 0 25px 0;
        text-align: center;
    }

    .post .comments .commentbg {
        background-color: #bdc3c7;
        border-radius: 2px;
        display: inline-block;
        padding: 12px 17px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Open Sans Bold', sans-serif;
        position: relative;
    }

    .post .comments .commentbg .mark {
        width: 11px;
        height: 11px;
        background-color: #bdc3c7;
        position: absolute;
        bottom: 0;
        left: 43%;
        margin-bottom: -5px;
        transform: rotate(45deg);
        -ms-transform: rotate(45deg); /* IE 9 */
        -webkit-transform: rotate(45deg); /* Opera, Chrome, and Safari */
    }

    .post .views {
        border-bottom: solid 1px #f1f1f1;
        color: #9da6aa;
        font-size: 12px;
        font-family: 'Open Sans Regular', sans-serif;
        text-align: center;
        line-height: 29px;
    }

    .post .views i {
        font-size: 14px;
    }

    .post .time {
        color: #9da6aa;
        font-size: 12px;
        font-family: 'Open Sans Regular', sans-serif;
        text-align: center;
        line-height: 29px;

    }

    .post .time i {
        font-size: 14px;
    }

    /*-----------------------------------------------------------------*/
    /* #02_topic.html - TOPIC */

    /*--- Breadcrumb ---*/
    .breadcrumbf a, .breadcrumbf {
        color: #bdc3c7;
        font-size: 12px;
        font-family: 'Open Sans Regular', sans-serif;
        line-height: 62px;
    }

    .breadcrumbf a:hover {
        text-decoration: underline;
    }

    /*--- Topic ---*/
    .topic .userinfo {
        width: 12%;
    }

    .topic .posttext {
        width: 88%;
    }

    .postinfobot {
        border-top: solid 1px #f1f1f1;
        line-height: 50px;
        padding: 0 30px 0 94px;
    }

    .postinfobot .likeblock {
        width: 50%;
    }

    .postinfobot .prev {
        width: 30px;
    }

    .postinfobot .prev a {
        font-size: 18px;
        color: #bdc3c7;
    }

    .postinfobot .posted {
        width: 300px;
        margin-left: 18px;
        font-size: 12px;
        color: #bdc3c7;
        font-family: 'Open Sans Regular', sans-serif;
    }

    .postinfobot .posted i {
        font-size: 18px;
        color: #bdc3c7;
        padding-right: 8px;
    }

    .postinfobot .next {
        width: 50%;
        text-align: right;
    }

    .postinfobot .next a {
        font-size: 18px;
        color: #bdc3c7;
    }

    .postinfobot .next a i {
        padding-right: 18px;
    }

    .up {
        color: #1abc9c;
        font-size: 12px;
    }

    .up i,
    .down i {
        font-size: 20px;
        padding-right: 10px;
    }

    .down {
        color: #db7a7a;
        font-size: 12px;
        margin-left: 20px;
    }

    a.up:hover {
        text-decoration: none;
        color: #1de4bd;
    }

    a.down:hover {
        text-decoration: none;
        color: #f48989;
    }

    .beforepagination {
        margin-bottom: 0;
    }

    /*--- Quote post ---*/
    .post blockquote {
        border: solid 1px #f1f1f1;
        border-radius: 2px;
        font-size: 14px;
        padding: 18px;
    }

    .post blockquote .original,
    .postreply {
        font-size: 12px;
        color: #bdc3c7;
        display: block;
        font-family: 'Open Sans Regular', sans-serif;
    }

    .textwraper textarea {
        border: none;
        box-shadow: none;
        background-color: #f1f1f1;
        /*    width: 610px;*/
        width: 100%;
    }

    .textwraper {
        background-color: #f1f1f1;
        border-radius: 2px;
        padding: 18px;
    }

    .notechbox {
        width: 20px;
    }

    .notechbox input {
        width: 12px;
        box-shadow: none;
        margin-top: 8px;
        border-color: #bdc3c7;
    }

    .notechbox input:active,
    .notechbox input:focus,
    .notechbox input:hover {
        box-shadow: none;
    }

    .postinfobot label {
        color: #bdc3c7;
        font-size: 12px;
        font-family: 'Open Sans Regular', sans-serif;

    }

    .smile a {
        margin-right: 20px;
        font-size: 20px;
        color: #bdc3c7;
    }

    .btn-primary {
        background-color: #1abc9c;
        box-shadow: none;
        border-radius: 2px;
        padding: 10px 15px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Open Sans Bold', sans-serif;
        border: none;

    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
        border: none;
        background-color: #20e1bb;
        box-shadow: none;
    }

    /*-----------------------------------------------------------------*/
    /*--- #03_new_topic.html - NEW TOPIC ---*/

    .newtopic input[type=text],
    .newtopic input[type=password] {
        border-radius: 2px;
        box-shadow: none;
        border: none;
        background-color: #f1f1f1;
        padding: 20px;
        font-size: 14px;
        color: #989c9e;
        font-family: 'Open Sans Light', sans-serif;
        margin-bottom: 20px;
        height: 50px;
    }

    .newtopic select {
        border-radius: 2px;
        box-shadow: none;
        border: solid 1px #cfd5d7;
        background-color: #ffffff;

        font-size: 14px;
        color: #989c9e;
        font-family: 'Open Sans Light', sans-serif;
        margin-bottom: 20px;
        height: 50px;
    }

    .newtopic select:hover,
    .newtopic select:focus,
    .newtopic select:active {
        box-shadow: none;
    }

    .newtopic textarea {
        border-radius: 2px;
        box-shadow: none;
        border: none;
        background-color: #f1f1f1;
        padding: 20px;
        font-size: 14px;
        color: #989c9e;
        font-family: 'Open Sans Light', sans-serif;
        margin-bottom: 20px;
        height: 150px;
    }

    .newtopic textarea:hover,
    .newtopic textarea:focus,
    .newtopic textarea:active {
        box-shadow: none;
    }

    .newtopic p {
        font-size: 14px;
        color: #363838;
        font-family: 'Open Sans Light', sans-serif;
    }

    .newtopcheckbox input {
        margin-top: 5px;
        width: 18px;
        height: 18px;

        /*    width: 18px;
            box-shadow: none;
            margin-top: 8px;
            border-color: #bdc3c7;*/

    }

    .checkbox input {
        margin-right: 7px;
    }

    .checkbox .fa-facebook-square {
        color: #3b5b99;
        font-size: 20px;
        margin-top: 4px;
    }

    .checkbox .fa-google-plus-square {
        color: #e74724;
        font-size: 20px;
        margin-top: 4px;
    }

    .checkbox .fa-twitter {
        color: #42c8f4;
        font-size: 20px;
        margin-top: 4px;
    }

    .loading {
        text-align: right;
    }

    .similarposts {
        /*    height: 57px;*/
        margin-bottom: 20px;

    }

    .similarposts p {
        display: inline;
        color: #bdc3c7;
    }

    .similarposts p span {
        color: #363838;
    }

    .similarposts .fa-info-circle {
        font-size: 18px;
        color: #3498db;
        margin-right: 10px;
    }

    .similarposts .fa-spinner {
        font-size: 18px;
        color: #363838;
    }

    .postinfotop h2 {
        color: #363838;
        font-size: 14px;
        font-family: 'Open Sans Bold', sans-serif;
        padding: 20px;
        margin: 0;
        border-bottom: solid 1px #f1f1f1;
    }

    /*-----------------------------------------------------------------*/
    /*--- #04_new_account.html - NEW ACCOUNT ---*/

    .acccap h3 {
        padding: 7px;
        margin: 0;
        border-radius: 2px;
        background-color: #697683;
        display: inline-block;
        color: #ffffff;
        font-size: 12px;
        font-family: 'Open Sans Regular', sans-serif;

    }

    .acccap .posttext {
        padding-bottom: 0;
    }

    .acccap .userinfo {
        padding-top: 0;
        padding-bottom: 0;
    }

    .accsection.privacy h3 {
        background-color: #9b59b6;
    }

    .accsection.privacy .posttext {
        padding: 0;
        padding-top: 20px;
    }

    .accsection.privacy p {
        margin-bottom: 0;
    }

    .accsection.privacy .checkbox {
        margin: 20px 0 10px 0;
    }

    .accsection.survey h3 {
        background-color: #e67e22;
    }

    .accsection.networks h3 {
        background-color: #80d3ab;

    }

    .accsection .htext {
        width: 40%;
        float: left;
    }

    .accsection .hnotice {
        width: 60%;
        float: left;
        text-align: right;
    }

    .networks .btn {
        display: block;
        width: 100%;
        margin-bottom: 20px;
        padding: 20px;
        color: #ffffff;
        font-size: 14px;
        font-family: 'Open Sans Light', sans-serif;
        text-align: left;
    }

    .networks .btn-fb {
        background-color: #3b5b99;
    }

    .networks .btn-tw {
        background-color: #42c8f4;
    }

    .networks .btn-gp {
        background-color: #cd3d1e;
    }

    .networks .btn-pin {
        background-color: #bd1425;
    }

    .newaccountpage .postinfobot {

        padding: 0 30px 0 115px;

    }

    .accsection .imgsize {
        color: #989c9e;
        font-size: 12px;
        font-family: 'Open Sans Regular', sans-serif;
        margin: 10px 0;
    }

    .accsection input[type=password] {
        margin-bottom: 0;
    }

    /*-----------------------------------------------------------------*/
    /*--- Extra small devices (less 767px) ---*/

    @media (max-width: 767px) {

        /*--- index.html ---*/
        .container-fluid {
            padding: 0;
        }

        .post .userinfo {
            width: 30%;
            padding: 15px 0 15px 15px;
        }

        .post .posttext {
            width: 70%;
            padding-right: 15px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .post .comments .commentbg {
            font-size: 12px;
            padding: 7px;
            min-width: 35px;
        }

        .post .time i {
            display: block;
            margin-top: 5px;
        }

        .post .views i {
            display: block;
            margin-top: 5px;
        }

        .post .comments .commentbg .mark {
            left: 36%;
        }

        .post .time,
        .post .views,
        .post .views {
        }

        .headernav {
            height: auto;
        }

        .avt {
            height: auto;
            margin-bottom: 15px;
        }

        .selecttopic select {
            width: 100%;
        }

        .avatar .dropdown-menu {
            left: auto;
            right: 0;
        }

        .selecttopic .dropdown-menu {
            margin-top: -20px;
        }

        .dropdown.avatar .status {
            right: 14px;
        }

        .dropdown.avatar b.caret {
            color: #363838;
        }

        .sociconcent {
            text-align: center;
        }

        /*--- 02_topic.html ---*/
        .postinfobot {
            padding: 10px;
        }

        .postinfobot .likeblock {
            width: 100%;
        }

        .postinfobot .posted {
            width: 200px;
            margin: 0;
        }

        .postinfobot .next {
            width: 76px;
            margin: 0;
        }

        .textwraper textarea {
            width: 175px;
        }

        footer ul.socialicons {
            margin: 0;
            padding: 0;
        }

        /* end 2*/
        /*--- 03_new_topic.html ---*/
        #pass {
            margin-bottom: 20px;
        }

        .accsection .htext,
        .accsection .hnotice {
            width: 100%;
        }

        .accsection .hnotice {
            font-size: 10px;
        }

        .postinfobot .lblfch {
            width: 80%;
        }

        .postinfobot .lblfch label {
            line-height: normal;
            padding-top: 15px;
            padding-bottom: 15px;

        }

        /* end 3 */
    }

    /*-----------------------------------------------------------------*/
    /*--- Small devices (768 - 991px) ---*/

    @media (min-width: 768px) and (max-width: 991px) {

        .container-fluid {
            padding: 0;
        }

        .post .userinfo {
            width: 15%;
            padding: 15px 0 15px 15px;
        }

        .post .posttext {
            width: 85%;
            padding-right: 15px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .post .comments .commentbg {
            font-size: 12px;
            padding: 7px;
            min-width: 35px;
        }

        .post .time i {
            display: block;
            margin-top: 5px;
        }

        .post .views i {
            display: block;
            margin-top: 5px;
        }

        .post .comments .commentbg .mark {
            left: 36%;
        }

        .headernav {
            height: auto;
        }

        .avt {
            height: auto;
            margin-bottom: 15px;
        }

        .selecttopic select {
            width: 100%;
        }

        .avatar .dropdown-menu {
            left: auto;
            right: 0;
        }

        .selecttopic .dropdown-menu {
            margin-top: -20px;
        }

        .dropdown.avatar .status {
            right: 14px;
        }

        .dropdown.avatar b.caret {
            color: #363838;
        }

    }

    /*-----------------------------------------------------------------*/
    /*--- Medium devices (992-1200px) ---*/
    @media (min-width: 992px) and (max-width: 1200px) {
        .container-fluid {
            padding: 0;
        }

        .headernav .search .txt {
            width: 75%;
        }

        .avatar .dropdown-menu {
            left: auto;
            right: 0;
        }

        ul.socialicons {
            margin-bottom: 0;
        }

        /* 2 */
        .textwraper textarea {

            width: 100%;
        }

        /* end 2 */
    }

    /*-----------------------------------------------------------------*/
    /*--- Large devices (more 1200px) ---*/
    @media (min-width: 1201px) {
        .container-fluid {
            padding: 0;
        }

        .container {
            padding: 0;
        }
    }
</style>
<?php $mhs_km = \frontend\models\Mahasiswa::find()->where(['id' => Yii::$app->user->identity->getId()])->one() ?>
<div class="subheader subheader-v2 has-bg-image" data-bg-image="<?= Yii::$app->request->baseUrl ?>/img/forum.jpg"
     style="padding: 0">
    <div class="container" style="background-color: rgba(0,0,0,0.4); width: 100%; height: 300px">
        <div class="row">
            <div class="col-md-12 text-center" style="padding-top: 95px;">
                <h1 class="block-title">
                    DISSCUSSION GROUP</h1>

                <p class="block-secondary-title invert">Alumni Forum Place</p>
            </div>
        </div>
    </div>
</div>
<div class="headernav">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                <div class="stnt pull-left">
                    <a href="<?= Yii::$app->request->baseUrl ?>/forum/create">
                        <button class="btn btn-primary">Start New Topic</button>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-md-8">
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post beforepagination">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="<?= Yii::$app->request->baseUrl ?>/uploads/mhs/<?= $mhs->foto ?>" alt=""/>

                                <div class="status green">&nbsp;</div>
                            </div>

                            <div class="icons">
                                <img src="images/icon1.jpg" alt=""/><img src="images/icon4.jpg" alt=""/><img
                                    src="images/icon5.jpg" alt=""/><img src="images/icon6.jpg" alt=""/>
                            </div>
                        </div>
                        <div class="posttext pull-left">
                            <h2><?= $model->judul ?></h2>

                            <p><?= $model->isi ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="postinfobot">
                        <div class="likeblock pull-left">
                            Post By <?= $mhs->nama_lengkap ?>
                        </div>
                        <div class="next pull-right">
                            <i class="fa fa-clock-o"></i> Posted on : <?= $model->tanggal ?>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
                <br>
                <!-- POST -->

                <?=
                \yii\widgets\ListView::widget(['dataProvider' => $dataProvider,
                    'layout' => "{items}\n{pager}",
                    'options' => [
                        'tag' => 'div',
                        'class' => 'list-wrapper',
                        'id' => 'list-wrapper',
                    ],

                    'itemView' => function ($model) {
                        return $this->render('_list_item_coment', ['model' => $model]);
                        },
                ]);
                ?>

                <div class="post">
                    <form action="#" class="form" method="post">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img src="<?= Yii::$app->request->baseUrl ?>/uploads/mhs/<?= $mhs_km->foto ?>" alt=""/>

                                    <div class="status red">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="images/icon3.jpg" alt=""/><img src="images/icon4.jpg" alt=""/><img
                                        src="images/icon5.jpg" alt=""/><img src="images/icon6.jpg" alt=""/>
                                </div>
                            </div>
                            <?php $form = ActiveForm::begin([
                                    'id' => 'KomentarForum',
                                    //'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'options' => [
                                            'tag' => false,
                                        ],
                                    ],
                                    'enableClientValidation' => true,
                                    'errorSummaryCssClass' => 'error-summary alert alert-error'
                                ]
                            );
                            ?>

                            <div class="posttext pull-left">
                                <div class="textwraper">
                                    <div class="postreply">Post a Reply</div>
                                    <?= $form->field($models, 'isi_komentar')->textarea(['rows' => 6])->label(false) ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfobot">

                            <div class="notechbox pull-left">
                            </div>
                            <?php echo $form->errorSummary($models); ?>

                            <div class="pull-right postreply">
                                <div class="pull-left smile"></div>
                                <div class="pull-left">
                                    <?= Html::submitButton('Comment', ['class' => 'btn btn-primary']); ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php ActiveForm::end(); ?>

                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div><!-- POST -->


            </div>
            <div class="col-lg-4 col-md-4">

                <!-- -->
                <div class="sidebarblock">
                    <h3>Categories</h3>

                    <div class="divline"></div>
                    <div class="blocktxt">
                        <ul class="cats">
                            <?php foreach ($hslCt as $cat) { ?>
                                <li><a href="<?= Yii::$app->request->baseUrl ?>/forum?kat=<?= $cat['id'] ?>"><?= $cat['nama_kategori'] ?>
                                        <span class="badge pull-right"><?= $cat['total'] ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="sidebarblock">
                    <h3>My Active Threads</h3>
                    <?php if ($myAct != NULL) { ?>
                        <?php foreach ($myAct as $myActivity) { ?>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <a href="<?= Yii::$app->request->baseUrl ?>/forum/detail?id=<?= $myActivity->id ?>"><?= $myActivity->judul ?></a>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="divline"></div>
                        <div class="blocktxt">
                            No Data Found
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
