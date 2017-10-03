<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IzinDokter;

/**
* IzinDokterSearch represents the model behind the search form about `app\models\IzinDokter`.
*/
class IzinDokterSearch extends IzinDokter
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id_no_izin', 'keahlian'], 'integer'],
            [['no_izin'], 'safe'],
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
$query = IzinDokter::find();

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
            'id_no_izin' => $this->id_no_izin,
            'keahlian' => $this->keahlian,
        ]);

        $query->andFilterWhere(['like', 'no_izin', $this->no_izin]);

return $dataProvider;
}
}