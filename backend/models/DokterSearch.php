<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dokter;

/**
* DokterSearch represents the model behind the search form about `app\models\Dokter`.
*/
class DokterSearch extends Dokter
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id_dokter', 'id_no_izin', 'id_kota', 'id_provinsi', 'id_user'], 'integer'],
            [['email', 'alamat_rumah', 'alamat_praktik', 'nama_dokter', 'no_telp', 'password'], 'safe'],
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
$query = Dokter::find();

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
            'id_dokter' => $this->id_dokter,
            'id_no_izin' => $this->id_no_izin,
            'id_kota' => $this->id_kota,
            'id_provinsi' => $this->id_provinsi,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat_rumah', $this->alamat_rumah])
            ->andFilterWhere(['like', 'alamat_praktik', $this->alamat_praktik])
            ->andFilterWhere(['like', 'nama_dokter', $this->nama_dokter])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'password', $this->password]);

return $dataProvider;
}
}