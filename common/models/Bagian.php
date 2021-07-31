<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bagian".
 *
 * @property int $id_bagian
 * @property string $kode_mak
 * @property string $nama_bagian
 */
class Bagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_mak', 'nama_bagian'], 'required'],
            [['kode_mak', 'nama_bagian'], 'string', 'max' => 125],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id_bagian' => 'Id Bagian',
            'kode_mak' => 'Kode Mak',
            'nama_bagian' => 'Nama Bagian',
        ];
    }
}
