<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `common\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */

    public $orderAmount;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name','orderAmount'], 'safe'],
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
    $query = Customer::find();
    $subQuery = Order::find()
        ->select('customer_id, SUM(amount) as order_amount')
        ->groupBy('customer_id');
    $query->leftJoin(['orderSum' => $subQuery], 'orderSum.customer_id = id');

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    $dataProvider->setSort([
        'attributes' => [
            'id',
            'name',
            'orderAmount' => [
                'asc' => ['orderSum.order_amount' => SORT_ASC],
                'desc' => ['orderSum.order_amount' => SORT_DESC],
                'label' => 'Order Name'
            ]
        ]
    ]); 

    if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }

    $query->andFilterWhere([
        'id' => $this->id,
        //'orderAmount' =>$this->amount,
    ]);

    $query->andFilterWhere(['like', 'name', $this->name]);
    $query->andWhere(['orderSum.order_amount' => $this->orderAmount]);

        return $dataProvider;
    }
}
