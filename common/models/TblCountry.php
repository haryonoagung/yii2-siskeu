<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_country".
 *
 * @property int $id Unique country identifier
 * @property string $country_name Country name
 *
 * @property TblPerson[] $tblPeople
 */
class TblCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_name'], 'required'],
            [['country_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_name' => 'Country Name',
        ];
    }

    /**
     * Gets query for [[TblPeople]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeople()
    {
        return $this->hasMany(TblPerson::className(), ['country_id' => 'id']);
    }
}
