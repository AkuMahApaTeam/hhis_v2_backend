<?php
$this->title = 'IKA ITS';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row" style="background-color: #e5e5e5;width: 101%">
    <div class="search-form" style="width: 75%; display: inline-block ">
        <div id="map" style="height: 345px;margin-top: 4px;margin-left: 22px"></div>
    </div>
    <div class="restaurant" style="width: 20%;display: inline-block;">
        <form method="post">
            <div class="content-restaurant" style="padding: 0">
                <div class="sidebar" style="background-color: transparent">
                    <div class="sidebar-fields" style="padding-top: 5px">
                        <div class="custom-select-box">
                            <?php
                            $arr2 = \frontend\models\Fakultas::find()->all();
                            $prd = \yii\helpers\ArrayHelper::map($arr2, 'id', 'nama_fakultas');
                            echo \kartik\widgets\Select2::widget([
                                'name' => 'fakultas',
                                'data' => $prd,
                                'size' => \kartik\widgets\Select2::MEDIUM,
                                'value' => $f,
                                'options' => [
                                    'placeholder' => 'Pilih Fakultas ...',
                                    'id' => 'fakultas',

                                ],
                            ]);
                            ?>
                        </div>

                        <div class="custom-select-box">
                            <?php
                            $arr3 = \frontend\models\Jurusan::find()->all();
                            $prd3 = \yii\helpers\ArrayHelper::map($arr3, 'id', 'nama_jurusan');
                            echo \kartik\widgets\Select2::widget([
                                'name' => 'jurusan',
                                'data' => $prd3,
                                'size' => \kartik\widgets\Select2::MEDIUM,
                                'value' => $j,
                                'options' => [
                                    'placeholder' => 'Pilih Jurusan ...',
                                    'id' => 'jurusan',

                                ],
                            ]);
                            ?>
                        </div>
                        <div class="custom-select-box">
                            <?php
                            $arr4 = [];
                            for ($i = date('Y'); $i >= 1997; $i--)
                                $arr4[] = [
                                    'id' => $i,
                                    'name' => $i
                                ];
                            $prd4 = \yii\helpers\ArrayHelper::map($arr4, 'id', 'name');
                            echo \kartik\widgets\Select2::widget([
                                'name' => 'thn_masuk',
                                'data' => $prd4,
                                'size' => \kartik\widgets\Select2::MEDIUM,
                                'value' => $t,
                                'options' => [
                                    'placeholder' => 'Pilih Tahun Masuk ...',
                                    'id' => 'thn_masuk',

                                ],
                            ]);
                            ?>
                        </div>

                        <div class="custom-select-box">
                            <?=
                            \dosamigos\selectize\SelectizeTextInput::widget([
                                'name' => 'selected_minat',
                                'id' => 'selected_minat',
                                'loadUrl' => ['alumni-directory/listm'],
                                'options' => ['class' => 'form-control','placeholder' => 'Pilih Skill'],
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
                        <div class="custom-select-box">
                            <?=
                            \dosamigos\selectize\SelectizeTextInput::widget([
                                'name' => 'selected_minat2',
                                'id' => 'selected_minat2',
                                'loadUrl' => ['alumni-directory/listmnt'],
                                'options' => ['class' => 'form-control','placeholder' => 'Pilih Minat'],
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
                        <button class="btn btn-primary btn-block"
                                href="<?= Yii::$app->request->baseUrl . '/alumni-directory/fakultas' ?>">Find Now
                        </button>
                    </div>

                </div>
        </form>
    </div>
</div>
<div class="col-md-12">
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

</div>
<link rel="stylesheet" type="text/css"
      href="http://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/0.4.0/MarkerCluster.css"/>
<link rel="stylesheet" type="text/css"
      href="http://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/0.4.0/MarkerCluster.Default.css"/>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>
<script type='text/javascript'
        src='http://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/0.4.0/leaflet.markercluster.js'></script>

<script>
    //    var map = new Map();
    //    //var mapHandler = new MapHandler(map);
    //    var mahasiswa;
    //    $.ajax({
    //        url: '<?//=\yii\helpers\Url::to(['alumni-directory/get-pos'])?>//',
    //        data: {
    //            id: this.value
    //        },
    //        type: 'GET',
    //        success: function (data) {
    //            mahasiswa = JSON.parse(data);
    //            for (var i = 0; i < mahasiswa.length; i++) {
    //                console.log(mahasiswa[i].lat);
    //                var marker = map.drawMarker(mahasiswa[i].lat, mahasiswa[i].lng);
    //                map.addPopup(marker, mahasiswa[i].nama_lengkap, false);
    //            }
    //
    //        }
    //    });


</script>

<script>

    //    var poly = new PolygonEditor({
    //        id: "map",
    //        markerPath: "<?//=Yii::$app->request->baseUrl?>///css_new/js/leaflet/images/",
    //        enableEditor: false
    //    });
    var myURL = "<?= Yii::$app->request->baseUrl.'/img/' ?>";
    var map = L.map('map', {
        center: [10.0, 5.0],
        minZoom: 2,
        zoom: 2
    });
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYWRtaW5uZXciLCJhIjoiY2o1dHVqbjdlMDA5ZTJxcnh2c3l1cnowOSJ9.t9BkSzPNO0egAXZt5mx--w', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiYWRtaW5uZXciLCJhIjoiY2o1dHVqbjdlMDA5ZTJxcnh2c3l1cnowOSJ9.t9BkSzPNO0egAXZt5mx--w'
    }).addTo(map);
    var myIcon = L.icon({
        iconUrl: myURL + 'images/pin24.png',
        iconRetinaUrl: myURL + 'images/pin48.png',
        iconSize: [29, 24],
        iconAnchor: [9, 21],
        popupAnchor: [0, -14]
    });

    var arrayPolyline = [];
    var fixPolyline = [];

    var a = 1;
    var markerClusters = L.markerClusterGroup();
    function loadMahasiswa() {
        $.ajax({
            data: {
                'i': a,
            },
            url: '<?=\yii\helpers\Url::toRoute(['/alumni-directory/data'])?>',
            type: 'post',
            dataType: "json",
            success: function (data) {
                var marker;
                for (var i = 0, len = data.length; i < len; i++) {
                    if (data[i].lat != null && data[i].lng != null) {
                        //cek di map rumah
                        marker = L.marker([data[i].lat, data[i].lng], {});
                    } else {
                        console.log("mahasiswa cek");
                    }
                    if (marker != null) {
                        var popup =
                            '<center><img width="50px" src=<?= Yii::$app->request->baseUrl."/uploads/mhs/" ?>' + data[i].foto + '></center>' +
                            '<br/><b>Nama :</b> ' + data[i].nama_lengkap;

                        var m = L.marker([data[i].lat, data[i].lng], {icon: myIcon})
                            .bindPopup(popup);

                        markerClusters.addLayer(m);
                        map.addLayer(markerClusters);

                    }
                }
                a++;
//                console.log(data.length);
                if (data.length != 0) {
                    loadMahasiswa();
                    return;

                }else if(data.length==0){
                    console.log("stoop");
                }
                            }

        });
    }

    loadMahasiswa();
</script>
