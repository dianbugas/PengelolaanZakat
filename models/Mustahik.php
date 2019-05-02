<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mustahik".
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
 * @property Penyaluran[] $penyalurans
 */
class Mustahik extends \yii\db\ActiveRecord
{
    // var untuk menyimpan fisik file foto
    public $fotoFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mustahik';
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
            // [['nik'], 'unique'],
            [['idkecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['idkecamatan' => 'id']],
            [['idkelurahan'], 'exist', 'skipOnError' => true, 'targetClass' => Kelurahan::className(), 'targetAttribute' => ['idkelurahan' => 'id']],
            // tambahan
            [
                ['fotoFile'], 'file',
                'skipOnEmpty' => true,
                'extensions' => ['png', 'jpg', 'gif', 'jpeg'],
                'maxSize' => 2048000, // max 2000 KB
                'minSize' => 10240, // min 10 KB

            ],
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
            'jeniskelamin' => 'Jenis kelamin',
            'tempatlahir' => 'Tempat lahir',
            'tanggallahir' => 'Tanggal lahir',
            'idkecamatan' => 'Kecamatan',
            'idkelurahan' => 'Kelurahan',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'fotoFile' => 'File Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'idkecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['id' => 'idkelurahan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyalurans()
    {
        return $this->hasMany(Penyaluran::className(), ['idmustahik' => 'id']);
    }
}
