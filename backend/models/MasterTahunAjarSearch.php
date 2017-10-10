<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterTahunAjar;

/**
 * MasterTahunAjarSearch represents the model behind the search form about `app\models\MasterTahunAjar`.
 */
class MasterTahunAjarSearch extends MasterTahunAjar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'total_kuota', 'jeda_akhir'], 'integer'],
            [['awal', 'akhir'], 'safe'],
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
        $query = MasterTahunAjar::find();

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
            'awal' => $this->awal,
            'akhir' => $this->akhir,
            'total_kuota' => $this->total_kuota,
            'jeda_akhir' => $this->jeda_akhir,
        ]);

        return $dataProvider;
    }
}