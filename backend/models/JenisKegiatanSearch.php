<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisKegiatan;

/**
* JenisKegiatanSearch represents the model behind the search form about `app\models\JenisKegiatan`.
*/
class JenisKegiatanSearch extends JenisKegiatan
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['type_kegiatan'], 'safe'],
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
$query = JenisKegiatan::find();

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
        ]);

        $query->andFilterWhere(['like', 'type_kegiatan', $this->type_kegiatan]);

return $dataProvider;
}
}