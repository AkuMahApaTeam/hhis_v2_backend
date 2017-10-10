<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KomentarForum;

/**
 * KomentarForumSearch represents the model behind the search form about `backend\models\KomentarForum`.
 */
class KomentarForumSearch extends KomentarForum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_forum', 'id_mahasiswa'], 'integer'],
            [['isi_komentar'], 'safe'],
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
        $query = KomentarForum::find();

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
            'id_forum' => $this->id_forum,
            'id_mahasiswa' => $this->id_mahasiswa,
        ]);

        $query->andFilterWhere(['like', 'isi_komentar', $this->isi_komentar]);

        return $dataProvider;
    }
}