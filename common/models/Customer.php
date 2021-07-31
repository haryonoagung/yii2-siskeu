<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_customer".
 *
 * @property int $id Unique customer identifier
 * @property string $name Customer name
 *
 * @property TblOrder[] $tblOrders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'orderAmount' => Yii::t('app', 'Order Amount'),
        ];
    }

    /**
     * Gets query for [[TblOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrders()
    {
        return $this->hasMany(TblOrder::className(), ['customer_id' => 'id']);
    }

    public function getOrderAmount()
    {
    return $this->hasMany(Order::className(), ['customer_id' => 'id'])->sum('amount');
    }
}
