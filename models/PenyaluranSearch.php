<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penyaluran;

/**
 * PenyaluranSearch represents the model behind the search form of `app\models\Penyaluran`.
 */
class PenyaluranSearch extends Penyaluran
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idmustahik', 'idjenisprogram'], 'integer'],
            [['keterangan','globalSearch'], 'safe'],
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
        $query = Penyaluran::find();

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
        // $query->orFilterWhere([
        //     'id' => $this->globalSearch,
        //     'idmustahik' => $this->globalSearch,
        //     'idjenisprogram' => $this->globalSearch,
        // ]);

        $query->orFilterWhere(['like', 'id', $this->globalSearch])
              ->orFilterWhere(['like', 'idmustahik', $this->globalSearch])
              ->orFilterWhere(['like', 'idjenisprogram', $this->globalSearch])
              ->orFilterWhere(['like', 'keterangan', $this->globalSearch]);

        return $dataProvider;
    }
}
