<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Artikel;

/**
* ArtikelSearch represents the model behind the search form about `app\models\Artikel`.
*/
class ArtikelSearch extends Artikel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id_artikel'], 'integer'],
            [['judul', 'deskripsi', 'image', 'abstrak'], 'safe'],
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
$query = Artikel::find();

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
            'id_artikel' => $this->id_artikel,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'abstrak', $this->abstrak]);

return $dataProvider;
}
}