<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayBank;

/**
 * PayBankSearch represents the model behind the search form of `app\models\PayBank`.
 */
class PayBankSearch extends PayBank
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['bankCode', 'bankBranch', 'bankBank', 'bankName', 'bankAddr'], 'safe'],
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
        $query = PayBank::find();

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
        ]);

        $query->andFilterWhere(['like', 'bankCode', $this->bankCode])
            ->andFilterWhere(['like', 'bankBranch', $this->bankBranch])
            ->andFilterWhere(['like', 'bankBank', $this->bankBank])
            ->andFilterWhere(['like', 'bankName', $this->bankName])
            ->andFilterWhere(['like', 'bankAddr', $this->bankAddr]);

        return $dataProvider;
    }
}
