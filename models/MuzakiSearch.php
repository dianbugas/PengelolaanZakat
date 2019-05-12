<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Muzaki;

/**
 * MuzakiSearch represents the model behind the search form of `app\models\Muzaki`.
 */
class MuzakiSearch extends Muzaki
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idkecamatan', 'idkelurahan'], 'integer'],
            [['nik', 'nama', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'alamat', 'foto'], 'safe'],
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
        $query = Muzaki::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idkecamatan' => $this->idkecamatan,
            'idkelurahan' => $this->idkelurahan,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jeniskelamin', $this->jeniskelamin])
            ->andFilterWhere(['like', 'tempatlahir', $this->tempatlahir])
            ->andFilterWhere(['like', 'tanggallahir', $this->tanggallahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
