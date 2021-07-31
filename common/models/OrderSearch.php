<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id'], 'integer'],
            [['created_on', 'details'], 'safe'],
            [['amount'], 'number'],
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
    public function search($params) {
    //$query = Customer::find();
    $query = Order::find();

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    $dataProvider->setSort([
        'attributes' => [
            'id',
            'name',
            /*
            'orderAmount' => [
                'asc' => ['orderSum.order_amount' => SORT_ASC],
                'desc' => ['orderSum.order_amount' => SORT_DESC],
                'label' => 'Order Name'
            ]
            */
        ]
    ]); 

    if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }

    $query->andFilterWhere([
        'id' => $this->id,
        'name' =>$this->name,
    ]);

    $query->andFilterWhere(['like', 'name', $this->name]);
    //$query->andWhere(['orderSum.order_amount' => $this->orderAmount]);

        return $dataProvider;
    }
}


