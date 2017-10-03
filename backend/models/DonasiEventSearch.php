<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DonasiEvent;

/**
 * DonasiEventSearch represents the model behind the search form about `app\models\DonasiEvent`.
 */
class DonasiEventSearch extends DonasiEvent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event', 'donatur', 'jumlah'], 'integer'],
            [['tanggal'], 'safe'],
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
            $query = DonasiEvent::find();
        } elseif($user->role==4) {
            $query = DonasiEvent::find()->where(['fakultas'=>$user->fakultas]);
        } else if($user->role==5){
            $query = DonasiEvent::find()->where(['fakultas'=>$user->fakultas,'jurusan'=>$user->jurusan]);
        }
       // $query = DonasiEvent::find();

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
            'event' => $this->event,
            'donatur' => $this->donatur,
            'jumlah' => $this->jumlah,
        ]);

        $query->andFilterWhere(['like', 'tanggal', $this->tanggal]);

        return $dataProvider;
    }
}