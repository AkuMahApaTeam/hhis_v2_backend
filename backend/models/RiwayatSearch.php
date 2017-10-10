<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Riwayat;

/**
* RiwayatSearch represents the model behind the search form about `app\models\Riwayat`.
*/
class RiwayatSearch extends Riwayat
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id_riwayat', 'id_pasien', 'id_dokter', 'umur', 'berat_badan', 'tinggi_badan', 'diagnosa'], 'integer'],
            [['riwayat_kesehatan_keluarga', 'keluhan_utama', 'larangan', 'note', 'tgl_periksa', 'perawatan'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = Riwayat::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id_riwayat' => $this->id_riwayat,
            'id_pasien' => $this->id_pasien,
            'id_dokter' => $this->id_dokter,
            'umur' => $this->umur,
            'berat_badan' => $this->berat_badan,
            'tinggi_badan' => $this->tinggi_badan,
            'diagnosa' => $this->diagnosa,
            'tgl_periksa' => $this->tgl_periksa,
        ]);

        $query->andFilterWhere(['like', 'riwayat_kesehatan_keluarga', $this->riwayat_kesehatan_keluarga])
            ->andFilterWhere(['like', 'keluhan_utama', $this->keluhan_utama])
            ->andFilterWhere(['like', 'larangan', $this->larangan])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'perawatan', $this->perawatan]);

return $dataProvider;
}
public function searchDetail($params,$id_pasien)
{
$query = Riwayat::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id_riwayat' => $this->id_riwayat,
            'id_pasien' => $id_pasien,
            'id_dokter' => $this->id_dokter,
            'umur' => $this->umur,
            'berat_badan' => $this->berat_badan,
            'tinggi_badan' => $this->tinggi_badan,
            'diagnosa' => $this->diagnosa,
            'tgl_periksa' => $this->tgl_periksa,
        ]);

        $query->andFilterWhere(['like', 'riwayat_kesehatan_keluarga', $this->riwayat_kesehatan_keluarga])
            ->andFilterWhere(['like', 'keluhan_utama', $this->keluhan_utama])
            ->andFilterWhere(['like', 'larangan', $this->larangan])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'perawatan', $this->perawatan]);

return $dataProvider;
}
}