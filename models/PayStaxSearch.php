<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayStax;

/**
 * PayStaxSearch represents the model behind the search form of `app\models\PayStax`.
 */
class PayStaxSearch extends PayStax
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['empUPFNo', 'staxRef', 'staxFld', 'staxStart', 'staxEnd', 'staxMoney'], 'safe'],
            [['staxAmt', 'staxIncome'], 'number'],
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
        $query = PayStax::find();

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
            'staxStart' => $this->staxStart,
            'staxEnd' => $this->staxEnd,
            'staxAmt' => $this->staxAmt,
            'staxIncome' => $this->staxIncome,
        ]);

        $query->andFilterWhere(['=', 'empUPFNo', $this->empUPFNo])
            ->andFilterWhere(['like', 'staxRef', $this->staxRef])
            ->andFilterWhere(['like', 'staxFld', $this->staxFld])
            ->andFilterWhere(['like', 'staxMoney', $this->staxMoney]);

        return $dataProvider;
    }
}
