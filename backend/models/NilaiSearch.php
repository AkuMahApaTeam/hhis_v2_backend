<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nilai;

/**
* NilaiSearch represents the model behind the search form about `app\models\Nilai`.
*/
class NilaiSearch extends Nilai
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'mahasiswa', 'mata_kuliah', 'semester'], 'integer'],
            [['nilai', 'index'], 'safe'],
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
$query = Nilai::find();

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
            'mahasiswa' => $this->mahasiswa,
            'mata_kuliah' => $this->mata_kuliah,
            'semester' => $this->semester,
        ]);

        $query->andFilterWhere(['like', 'nilai', $this->nilai])
            ->andFilterWhere(['like', 'index', $this->index]);

return $dataProvider;
}
}