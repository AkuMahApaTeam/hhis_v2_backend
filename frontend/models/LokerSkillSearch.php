<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LokerSkill;

/**
* LokerSkillSearch represents the model behind the search form about `frontend\models\LokerSkill`.
*/
class LokerSkillSearch extends LokerSkill
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'category_id', 'loker_id'], 'integer'],
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
$query = LokerSkill::find();

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
            'category_id' => $this->category_id,
            'loker_id' => $this->loker_id,
        ]);

return $dataProvider;
}
}