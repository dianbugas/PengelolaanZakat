<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenisprogram".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Penyaluran[] $penyalurans
 */
class Jenisprogram extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenisprogram';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 45],
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
    public function getPenyalurans()
    {
        return $this->hasMany(Penyaluran::className(), ['idjenisprogram' => 'id']);
    }
}
