<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property int $id
 * @property string $nama
 * @property int $idkecamatan
 *
 * @property Kecamatan $kecamatan
 * @property Mustahik[] $mustahiks
 * @property Muzaki[] $muzakis
 * @property Upz[] $upzs
 */
class Kelurahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idkecamatan'], 'required'],
            [['idkecamatan'], 'integer'],
            [['nama'], 'string', 'max' => 45],
            [['idkecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['idkecamatan' => 'id']],
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
            'idkecamatan' => 'Idkecamatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'idkecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMustahiks()
    {
        return $this->hasMany(Mustahik::className(), ['idkelurahan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuzakis()
    {
        return $this->hasMany(Muzaki::className(), ['idkelurahan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpzs()
    {
        return $this->hasMany(Upz::className(), ['idkelurahan' => 'id']);
    }
}
