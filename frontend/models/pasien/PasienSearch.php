<?php

namespace frontend\models\pasien;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\pasien\Pasien;

/**
 * PasienSearch represents the model behind the search form about `frontend\models\pasien\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          ['nik','required','message'=>'NIK tidak boleh kosong'],
          ['nik','integer','message'=>'maaf NIK salah'],
            [['id_pasien', 'nik'], 'integer'],
            [['nama_pasien', 'alamat', 'no_telp_pasien', 'gol_darah', 'jenis_kelamin'], 'safe'],
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
        $query = Pasien::find();

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
            'id_pasien' => $this->id_pasien,
            'nik' => $this->nik,
        ]);

        $query->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telp_pasien', $this->no_telp_pasien])
            ->andFilterWhere(['like', 'gol_darah', $this->gol_darah])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin]);

        return $dataProvider;
    }
}
