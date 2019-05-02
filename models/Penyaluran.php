<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyaluran".
 *
 * @property int $id
 * @property int $idmustahik
 * @property int $idjenisprogram
 * @property string $keterangan
 *
 * @property Jenisprogram $jenisprogram
 * @property Mustahik $mustahik
 */
class Penyaluran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyaluran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmustahik', 'idjenisprogram'], 'required'],
            [['idmustahik', 'idjenisprogram'], 'integer'],
            [['keterangan'], 'string', 'max' => 45],
            [['idjenisprogram'], 'exist', 'skipOnError' => true, 'targetClass' => Jenisprogram::className(), 'targetAttribute' => ['idjenisprogram' => 'id']],
            [['idmustahik'], 'exist', 'skipOnError' => true, 'targetClass' => Mustahik::className(), 'targetAttribute' => ['idmustahik' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idmustahik' => 'Mustahik',
            'idjenisprogram' => 'Jenis Program',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelJenisprogram()
    {
        return $this->hasOne(Jenisprogram::className(), ['id' => 'idjenisprogram']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelMustahik()
    {
        return $this->hasOne(Mustahik::className(), ['id' => 'idmustahik']);
    }
}
