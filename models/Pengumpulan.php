<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengumpulan".
 *
 * @property int $id
 * @property int $idmuzaki
 * @property int $idupz
 * @property string $keterangan
 *
 * @property Muzaki $muzaki
 * @property Upz $upz
 */
class Pengumpulan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengumpulan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmuzaki', 'idupz'], 'required'],
            [['idmuzaki', 'idupz'], 'integer'],
            [['keterangan'], 'string', 'max' => 45],
            [['idmuzaki'], 'exist', 'skipOnError' => true, 'targetClass' => Muzaki::className(), 'targetAttribute' => ['idmuzaki' => 'id']],
            [['idupz'], 'exist', 'skipOnError' => true, 'targetClass' => Upz::className(), 'targetAttribute' => ['idupz' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idmuzaki' => 'Idmuzaki',
            'idupz' => 'Idupz',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMuzaki()
    {
        return $this->hasOne(Muzaki::className(), ['id' => 'idmuzaki']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpz()
    {
        return $this->hasOne(Upz::className(), ['id' => 'idupz']);
    }
}
