<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ls".
 *
 * @property int $id_ls
 * @property int $berkas_id_berkas
 * @property string $tanggal_masuk
 * @property string $status
 * @property string $proses
 * @property string $keterangan
 */
class Ls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berkas','tanggal_masuk', 'status', 'proses', 'keterangan'], 'required'],
            [['id_berkas','id_bagian'], 'integer'],
            [['tanggal_masuk'], 'safe'],
            [['status', 'proses', 'keterangan'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ls' => 'Id Ls',
            'id_berkas' => 'Nama Berkas',
            'id_bagian' => 'Nama Bagian',
            'tanggal_masuk' => 'Tanggal Masuk',
            'status' => 'Status',
            'proses' => 'Proses',
            'keterangan' => 'Keterangan',
        ];
    }


    public function getBerkas2()
    {
        return $this->hasOne(Berkas::className(), ['id_berkas' => 'id_berkas']);
    }

    public function getBagian2()
    {
        return $this->hasOne(Bagian::className(), ['id_bagian' => 'id_bagian']);
    }
}
