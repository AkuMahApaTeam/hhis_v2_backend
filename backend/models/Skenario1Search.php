<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skenario1;

/**
 * Skenario1Search represents the model behind the search form about `app\models\Skenario1`.
 */
class Skenario1Search extends Skenario1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_mitra', 'id_tahun_ajar'], 'integer'],
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
        $query = Skenario1::find();
//$query->joinWith(['idTahunAjar']);

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
            'id_mitra' => $this->id_mitra,
            'id_tahun_ajar' => $this->id_tahun_ajar,
        ]);
//$query->andFilterWhere(['like', 'idTahunAjar.akhir', $this->id_tahun_ajar]);

        return $dataProvider;
    }
}