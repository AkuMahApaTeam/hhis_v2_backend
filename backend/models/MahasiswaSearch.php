<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mahasiswa;

/**
 * MahasiswaSearch represents the model behind the search form about `app\models\Mahasiswa`.
 */
class MahasiswaSearch extends Mahasiswa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'fakultas', 'jurusan'], 'integer'],
            [['nama_lengkap', 'nimrn', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'tahun_masuk', 'foto'], 'safe'],
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
        $id_user = Yii::$app->user->id;
        $user = User::findOne($id_user);
        if($user->role==2){
            $query = Mahasiswa::find();
        } elseif($user->role==4) {
            $query = Mahasiswa::find()->where(['fakultas'=>$user->fakultas]);
        } else if($user->role==5){
            $query = Mahasiswa::find()->where(['fakultas'=>$user->fakultas,'jurusan'=>$user->jurusan]);
        }

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
            'status' => $this->status,
            'fakultas' => $this->fakultas,
            'jurusan' => $this->jurusan,
        ]);

        $query->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'nimrn', $this->nimrn])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'tahun_masuk', $this->tahun_masuk])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}