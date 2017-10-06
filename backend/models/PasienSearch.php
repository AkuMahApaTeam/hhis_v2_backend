<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pasien;

/**
* PasienSearch represents the model behind the search form about `app\models\Pasien`.
*/
class PasienSearch extends Pasien
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id_pasien', 'nik', 'id_kota', 'id_provinsi', 'id_user'], 'integer'],
            [['nama_pasien', 'alamat', 'no_telp_pasien', 'gol_darah', 'jenis_kelamin'], 'safe'],
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
$query = Pasien::find();

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
            'id_pasien' => $this->id_pasien,
            'nik' => $this->nik,
            'id_kota' => $this->id_kota,
            'id_provinsi' => $this->id_provinsi,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp_pasien', $this->no_telp_pasien])
            ->andFilterWhere(['like', 'gol_darah', $this->gol_darah])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin]);

return $dataProvider;
}
}