<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MataKuliah;

/**
* MataKuliahSearch represents the model behind the search form about `app\models\MataKuliah`.
*/
class MataKuliahSearch extends MataKuliah
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'id_jurusan'], 'integer'],
            [['mata_kuliah'], 'safe'],
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
$query = MataKuliah::find();

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
            'id_jurusan' => $this->id_jurusan,
        ]);

        $query->andFilterWhere(['like', 'mata_kuliah', $this->mata_kuliah]);

return $dataProvider;
}
}