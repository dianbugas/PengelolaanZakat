<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mustahik;

/**
 * MustahikSearch represents the model behind the search form of `app\models\Mustahik`.
 */
class MustahikSearch extends Mustahik
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idkecamatan', 'idkelurahan'], 'integer'],
            [['nik', 'globalSearch', 'nama', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'alamat', 'foto'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Mustahik::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'nik', $this->globalSearch])
            ->orFilterWhere(['like', 'nama', $this->globalSearch])
            ->orFilterWhere(['like', 'jeniskelamin', $this->globalSearch])
            ->orFilterWhere(['like', 'tempatlahir', $this->globalSearch])
            ->orFilterWhere(['like', 'tanggallahir', $this->globalSearch])
            ->orFilterWhere(['like', 'alamat', $this->globalSearch])
            ->orFilterWhere(['like', 'foto', $this->globalSearch]);

        return $dataProvider;
    }
}
