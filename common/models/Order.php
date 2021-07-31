<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_order".
 *
 * @property int $id Unique order identifier
 * @property string $created_on Order creation date
 * @property string|null $details Order Details
 * @property float $amount Order Amount
 * @property int|null $customer_id Related customer identifier
 *
 * @property TblCustomer $customer
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_on', 'amount'], 'required'],
            [['created_on'], 'safe'],
            [['amount'], 'number'],
            [['customer_id'], 'integer'],
            [['details'], 'string', 'max' => 200],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_on' => 'Created On',
            'details' => 'Details',
            'amount' => 'Amount',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(TblCustomer::className(), ['id' => 'customer_id']);
    }
}
