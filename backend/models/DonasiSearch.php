<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donasi;

/**
 * DonasiSearch represents the model behind the search form about `app\models\Donasi`.
 */
class DonasiSearch extends Donasi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_mahasiswa', 'jumlah', 'valid'], 'integer'],
            [['tgl_donasi', 'tgl_valid'], 'safe'],
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
        //$query = Donasi::find();
        //$query->joinWith("mahasiswa");

        $id_user = Yii::$app->user->id;
        $user = User::findOne($id_user);

        if($user->role==2){
            $query = Donasi::find();
        } elseif($user->role==4) {
            $query = Donasi::find()->where(['fakultas'=>$user->fakultas]);
        } else if($user->role==5){
            $query = Donasi::find()->where(['fakultas'=>$user->fakultas,'jurusan'=>$user->jurusan]);
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
            'id_mahasiswa' => $this->id_mahasiswa,
            'jumlah' => $this->jumlah,
            'tgl_donasi' => $this->tgl_donasi,
            'valid' => $this->valid,
            'tgl_valid' => $this->tgl_valid,
        ]);

        return $dataProvider;
    }
}