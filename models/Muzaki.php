<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "muzaki".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $jeniskelamin
 * @property string $tempatlahir
 * @property string $tanggallahir
 * @property int $idkecamatan
 * @property int $idkelurahan
 * @property string $alamat
 * @property string $foto
 *
 * @property Kecamatan $kecamatan
 * @property Kelurahan $kelurahan
 * @property Pengumpulan[] $pengumpulans
 */
class Muzaki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'muzaki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idkecamatan', 'idkelurahan'], 'required'],
            [['idkecamatan', 'idkelurahan'], 'integer'],
            [['nik', 'nama', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'alamat', 'foto'], 'string', 'max' => 45],
            [['nik'], 'unique'],
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
            'nik' => 'Nik',
            'nama' => 'Nama',
            'jeniskelamin' => 'Jeniskelamin',
            'tempatlahir' => 'Tempatlahir',
            'tanggallahir' => 'Tanggallahir',
            'idkecamatan' => 'Idkecamatan',
            'idkelurahan' => 'Idkelurahan',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
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
    public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id' => 'idkelurahan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengumpulans()
    {
        return $this->hasMany(Pengumpulan::className(), ['idmuzaki' => 'id']);
    }
}
