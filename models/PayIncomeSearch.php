<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayIncome;

/**
 * PayIncomeSearch represents the model behind the search form of `app\models\PayIncome`.
 */
class PayIncomeSearch extends PayIncome
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'incMon', 'incYear'], 'integer'],
            [['empUPFNo'], 'safe'],
            [['incIncome'], 'number'],
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
        $query = PayIncome::find();

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
            'incMon' => $this->incMon,
            'incYear' => $this->incYear,
            'incIncome' => $this->incIncome,
        ]);

        $query->andFilterWhere(['=', 'empUPFNo', $this->empUPFNo]);

        return $dataProvider;
    }
}
