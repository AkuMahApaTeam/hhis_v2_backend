<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Forum;

/**
 * ForumSearch represents the model behind the search form about `backend\models\Forum`.
 */
class ForumSearch extends Forum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kategori_forum', 'id_jabatan', 'status', 'id_mahasiswa'], 'integer'],
            [['judul', 'isi', 'tanggal'], 'safe'],
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
        $query = Forum::find();

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
            'id_kategori_forum' => $this->id_kategori_forum,
            'id_jabatan' => $this->id_jabatan,
            'tanggal' => $this->tanggal,
            'status' => $this->status,
            'id_mahasiswa' => $this->id_mahasiswa,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $dataProvider;
    }
}