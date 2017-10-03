<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MhsSkill;

/**
 * LokerSkillSearch represents the model behind the search form about `frontend\models\LokerSkill`.
 */
class MhsSkillSearch extends MhsSkill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'skill_id', 'id_mahasiswa'], 'safe'],
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
        $query = MhsSkill::find();

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
            'skill_id' => $this->skill_id,
            'id_mahasiswa' => $this->id_mahasiswa,
        ]);

        return $dataProvider;
    }
}