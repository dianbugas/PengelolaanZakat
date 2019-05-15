<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Kelurahan[] $kelurahans
 * @property Mustahik[] $mustahiks
 * @property Muzaki[] $muzakis
 * @property Upz[] $upzs
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 45],
            [['nama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelurahans()
    {
        return $this->hasMany(Kelurahan::className(), ['idkecamatan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMustahiks()
    {
        return $this->hasMany(Mustahik::className(), ['idkecamatan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuzakis()
    {
        return $this->hasMany(Muzaki::className(), ['idkecamatan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpzs()
    {
        return $this->hasMany(Upz::className(), ['idkecamatan' => 'id']);
    }
}
