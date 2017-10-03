<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterKegiatan;

/**
 * MasterKegiatanSearch represents the model behind the search form about `app\models\MasterKegiatan`.
 */
class MasterKegiatanSearch extends MasterKegiatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_mitra', 'id_jenis', 'id_kontrak', 'id_tahun_ajar', 'nominal', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'flag', 'id_jurusan'], 'integer'],
            [['deskripsi_kegiatan', 'tanggal_mulai', 'tanggal_selesai'], 'safe'],
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
        $query = MasterKegiatan::find();

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
            'id' => $this->id,
            'id_mitra' => $this->id_mitra,
            'id_jenis' => $this->id_jenis,
            'id_kontrak' => $this->id_kontrak,
            'id_tahun_ajar' => $this->id_tahun_ajar,
            'nominal' => $this->nominal,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'flag' => 1,
            'id_jurusan' => $this->id_jurusan,
        ]);

        $query->andFilterWhere(['like', 'deskripsi_kegiatan', $this->deskripsi_kegiatan]);

        return $dataProvider;
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchDetail($params, $idKontrak)
    {
        $query = MasterKegiatan::find();

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
            'id_jenis' => $this->id_jenis,
            'id_kontrak' => $idKontrak,
            'id_tahun_ajar' => $this->id_tahun_ajar,
            'nominal' => $this->nominal,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'flag' => 1,
            'id_jurusan' => $this->id_jurusan,
        ]);

        $query->andFilterWhere(['like', 'deskripsi_kegiatan', $this->deskripsi_kegiatan]);

        return $dataProvider;
    }
}