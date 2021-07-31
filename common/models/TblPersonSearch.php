<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TblPerson;

/**
 * TblPersonSearch represents the model behind the search form of `common\models\TblPerson`.
 */
class TblPersonSearch extends TblPerson
{
    /**
     * {@inheritdoc}
     */
    public $fullName;
    public $parentName;
    
    public function rules()
    {
        return [
            [['id', 'country_id', 'parent_id'], 'integer'],
            [['first_name', 'last_name','fullName','parentName'], 'safe'],
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
        $query = TblPerson::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);
        $dataProvider->setSort([

            'attributes' => [
            'id',
            'parentName' => [
                'asc' => [
                    'parent.first_name' => SORT_ASC, 
                    'parent.last_name' => SORT_ASC
                 ],
                'desc' => [
                     'parent.first_name' => SORT_DESC, 
                     'parent.last_name' => SORT_DESC
                 ],
                'label' => 'Parent Name',
                'default' => SORT_ASC
            ],
            
            
            'fullName' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'label' => 'Full Name',
                'default' => SORT_ASC
            ],
            
            'country_id'
        ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['parent']);
            return $dataProvider;
        }

        // grid filtering conditions
       $this->addCondition($query, 'id');
       $this->addCondition($query, 'first_name', true);
       $this->addCondition($query, 'last_name', true);
       $this->addCondition($query, 'country_id');
       $this->addCondition($query, 'parent_id');
       
       
       $query->joinWith(['parent' => function ($q) {
        $q->where('parent.first_name LIKE "%' . $this->parentName . '%" ' .
        'OR parent.last_name LIKE "%' . $this->parentName . '%"');
    }]);
            return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    
    {
    if (($pos = strrpos($attribute, '.')) !== false) {
        $modelAttribute = substr($attribute, $pos + 1);
    } else {
        $modelAttribute = $attribute;
    }

    $value = $this->$modelAttribute;
    if (trim($value) === '') {
        return;
    }
    
    /* 
     * The following line is additionally added for right aliasing
     * of columns so filtering happen correctly in the self join
     */
    $attribute = "tbl_person.$attribute";

    if ($partialMatch) {
        $query->andWhere(['like', $attribute, $value]);
    } else {
        $query->andWhere([$attribute => $value]);
    }
}

}
