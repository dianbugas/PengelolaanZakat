<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "upz".
 *
 * @property int $id
 * @property string $nama
 * @property int $idkecamatan
 * @property int $idkelurahan
 * @property string $alamat
 * @property string $foto
 *
 * @property Pengumpulan[] $pengumpulans
 * @property Kecamatan $kecamatan
 * @property Kelurahan $kelurahan
 */
class Upz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'upz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idkecamatan', 'idkelurahan'], 'required'],
            [['idkecamatan', 'idkelurahan'], 'integer'],
            [['nama', 'alamat', 'foto'], 'string', 'max' => 45],
            [['idkecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['idkecamatan' => 'id']],
            [['idkelurahan'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['idkelurahan' => 'id']],
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
            'idkelurahan' => 'Idkelurahan',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengumpulans()
    {
        return $this->hasMany(Pengumpulan::className(), ['idupz' => 'id']);
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
    public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id' => 'idkelurahan']);
    }
}
