<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "berkas".
 *
 * @property int $id_berkas
 * @property string $no_mak
 * @property string $nama_berkas
 * @property int $nominal
 */
class Berkas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berkas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_mak', 'nama_berkas', 'nominal'], 'required'],
            [['no_mak', 'nama_berkas', 'nominal'], 'string', 'max' => 125],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berkas' => 'Id Berkas',
            'no_mak' => 'No Mak',
            'nama_berkas' => 'Nama Berkas',
            'nominal' => 'Nominal',
        ];
    }

    public function getGus()
    {
        return $this->hasMany(Gu::className(), ['berkas_id_berkas' => 'id_gu']);
    }

    public function getLss()
    {
        return $this->hasMany(Ls::className(), ['berkas_id_berkas' => 'id_ls']);
    }
}
