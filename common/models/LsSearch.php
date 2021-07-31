<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ls;

/**
 * GuSearch represents the model behind the search form of `common\models\Gu`.
 */
class LsSearch extends Ls
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ls', 'id_berkas'], 'integer'],
            [['id_bagian','tanggal_masuk', 'status', 'proses', 'keterangan'], 'safe'],
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
        $query = Ls::find();
        $query->innerJoinWith('bagian2');

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
            'id_ls' => $this->id_ls,
            'id_berkas' => $this->id_berkas,
            'tanggal_masuk' => $this->tanggal_masuk,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'proses', $this->proses])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'bagian2.nama_bagian', $this->id_bagian])
            ->andFilterWhere(['like', 'berkas2.nama_berkas', $this->id_berkas]);

        return $dataProvider;
    }
}
