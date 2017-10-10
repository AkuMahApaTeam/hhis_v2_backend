<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donatur;

/**
* DonaturSearch represents the model behind the search form about `app\models\Donatur`.
*/
class DonaturSearch extends Donatur
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'donatur', 'jumlah'], 'integer'],
            [['jenis_donatur'], 'safe'],
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
$query = Donatur::find();

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
            'donatur' => $this->donatur,
            'jumlah' => $this->jumlah,
        ]);

        $query->andFilterWhere(['like', 'jenis_donatur', $this->jenis_donatur]);

return $dataProvider;
}
}