<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $isbn
 * @property string $judul
 * @property string $tahun_cetak
 * @property int $stok
 * @property int $idpenerbit
 * @property int $idpengarang
 * @property string $cover
 *
 * @property Penerbit $penerbit
 * @property Pengarang $pengarang
 * @property Peminjaman[] $peminjamen
 */
class Buku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    //tambah variable baru untuk simpan fisik file gambar
    public $coverFile;

    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isbn', 'judul', 'tahun_cetak', 'stok', 'idpenerbit', 'idpengarang'], 'required'],
            [['stok', 'idpenerbit', 'idpengarang'], 'integer'],
            [['isbn', 'judul'], 'string', 'max' => 100],
            [['tahun_cetak', 'cover'], 'string', 'max' => 45],
            [['isbn'], 'unique'],
            [['idpenerbit'], 'exist', 'skipOnError' => true, 'targetClass' => Penerbit::className(), 'targetAttribute' => ['idpenerbit' => 'id']],
            [['idpengarang'], 'exist', 'skipOnError' => true, 'targetClass' => Pengarang::className(), 'targetAttribute' => ['idpengarang' => 'id']],
            
            //tambahan rule upload file
            [['coverFile'], 'file',
                'extensions' => 'jpg,jpeg,png,gif',
                'maxSize'=>'256000', // max 256kb
                'skipOnEmpty'=>true, 

            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'isbn' => 'ISBN',
            'judul' => 'Judul',
            'tahun_cetak' => 'Tahun Cetak',
            'stok' => 'Stok',
            'idpenerbit' => 'Id penerbit',
            'idpengarang' => 'Id pengarang',
            'cover' => 'Cover',
            'coverFile' => 'File Cover Buku',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenerbit()
    {
        return $this->hasOne(Penerbit::className(), ['id' => 'idpenerbit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengarang()
    {
        return $this->hasOne(Pengarang::className(), ['id' => 'idpengarang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeminjamen()
    {
        return $this->hasMany(Peminjaman::className(), ['idbuku' => 'id']);
    }
}