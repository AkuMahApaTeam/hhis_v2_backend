<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterKontrak;

/**
 * MasterKontrakSearch represents the model behind the search form about `app\models\MasterKontrak`.
 */
class MasterKontrakSearch extends MasterKontrak
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_mitra', 'nilai_kontrak', 'flag', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama', 'tanggal_mulai', 'tanggal_berakhir'], 'safe'],
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
        $query = MasterKontrak::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (\Yii::$app->user->identity->role == 6) {
            $this->id_mitra = \Yii::$app->user->identity->masterMitra->id;
        }

        if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'nama' => $this->nama,
            'id' => $this->id,
            'id_mitra' => $this->id_mitra,
            'nilai_kontrak' => $this->nilai_kontrak,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir,
            //'status' => $this->status,
            'flag' => 1,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function searchDetail($params, $idMitra)
    {
        $query = MasterKontrak::find();

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
            'nama' => $this->nama,
            'id' => $this->id,
            'id_mitra' => $idMitra,
            'nilai_kontrak' => $this->nilai_kontrak,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir,
            //'status' => $this->status,
            'flag' => 1,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}