<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Gu;

/**
 * GuSearch represents the model behind the search form of `common\models\Gu`.
 */
class GuSearch extends Gu
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;

    public function rules()
    {
        return [
            [['id_gu', 'id_berkas'], 'integer'],
            [['id_bagian','globalSearch','tanggal_masuk', 'status', 'proses', 'keterangan'], 'safe'],
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
        $query = Gu::find();
        $query->innerJoinWith('bagian');

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
            'id_gu' => $this->id_gu,
            'id_berkas' => $this->id_berkas,
            'tanggal_masuk' => $this->tanggal_masuk,
        ]);

        $query->orFilterWhere(['like', 'status', $this->globalSearch])
            ->orFilterWhere(['like', 'proses', $this->globalSearch])
            ->orFilterWhere(['like', 'keterangan', $this->globalSearch])
            ->orFilterWhere(['like', 'bagian.nama_bagian', $this->globalSearch]);

        return $dataProvider;
    }
}
