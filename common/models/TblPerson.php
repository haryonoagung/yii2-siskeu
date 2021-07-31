<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_person".
 *
 * @property int $id Unique person identifier
 * @property string $first_name First name
 * @property string $last_name Last name
 * @property int|null $country_id Residing Country
 * @property int|null $parent_id Parent person identifier
 *
 * @property TblCountry $country
 */
class TblPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['country_id', 'parent_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 60],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblCountry::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'country_id' => 'Country ID',
            'parent_id' => 'Parent ID',
            'fullName' => Yii::t('app', 'Full Name'),
            'countryName' => Yii::t('app', 'Country Name'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(TblCountry::className(), ['id' => 'country_id']);
    }

    public function getCountryName() 
    {
    return $this->country->country_name;
    }

    public function getFullName() 
    {
    return $this->first_name . ' ' . $this->last_name;
    }

    public function getParent()
    {
    return $this->hasOne(self::classname(), 
           ['parent_id' => 'id'])->
           from(self::tableName() . ' AS parent');
    }
    
}

