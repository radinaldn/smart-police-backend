<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Laporan;

/**
 * LaporanSearch represents the model behind the search form of `app\models\Laporan`.
 */
class LaporanSearch extends Laporan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_laporan', 'id_pelapor', 'id_kategori'], 'integer'],
            [['judul', 'ket', 'foto', 'created_at', 'updated_at'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = Laporan::find();

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
            'id_laporan' => $this->id_laporan,
            'id_pelapor' => $this->id_pelapor,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'id_kategori' => $this->id_kategori,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
