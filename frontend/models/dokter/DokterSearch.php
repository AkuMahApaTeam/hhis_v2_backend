<?php

namespace frontend\models\dokter;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\dokter\Dokter;

/**
 * DokterSearch represents the model behind the search form about `frontend\models\dokter\Dokter`.
 */
class DokterSearch extends Dokter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokter', 'id_no_izin'], 'integer'],
            [['email', 'alamat_rumah', 'alamat_praktik', 'nama_dokter', 'no_telp', 'password'], 'safe'],
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
        $query = Dokter::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_dokter' => $this->id_dokter,
            'id_no_izin' => $this->id_no_izin,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat_rumah', $this->alamat_rumah])
            ->andFilterWhere(['like', 'alamat_praktik', $this->alamat_praktik])
            ->andFilterWhere(['like', 'nama_dokter', $this->nama_dokter])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
