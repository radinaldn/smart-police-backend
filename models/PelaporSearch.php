<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelapor;

/**
 * PelaporSearch represents the model behind the search form of `app\models\Pelapor`.
 */
class PelaporSearch extends Pelapor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelapor'], 'integer'],
            [['password', 'nama', 'jk', 'alamat', 'foto', 'hp'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pelapor::find();

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
            'id_pelapor' => $this->id_pelapor,
        ]);

        $query->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'hp', $this->hp]);

        return $dataProvider;
    }
}
