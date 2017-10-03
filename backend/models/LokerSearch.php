<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Loker;

/**
* LokerSearch represents the model behind the search form about `backend\models\Loker`.
*/
class LokerSearch extends Loker
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_mahasiswa', 'flag'], 'integer'],
            [['judul', 'nama_kantor', 'isi', 'tanggal', 'lokasi', 'jenis_karyawan', 'email', 'kontak', 'url'], 'safe'],
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
$query = Loker::find();

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
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'id_mahasiswa' => $this->id_mahasiswa,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'nama_kantor', $this->nama_kantor])
            ->andFilterWhere(['like', 'isi', $this->isi])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'jenis_karyawan', $this->jenis_karyawan])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'kontak', $this->kontak])
            ->andFilterWhere(['like', 'url', $this->url]);

return $dataProvider;
}
}