<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctBankaccts;

/**
 * AcctBankacctsSearch represents the model behind the search form of `app\models\AcctBankaccts`.
 */
class AcctBankacctsSearch extends AcctBankaccts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bactVoucher', 'bactReceipt', 'bactJournal'], 'integer'],
            [['bactAcctCode', 'bactBankCode', 'bactBankName', 'bactAcctNo', 'bactAcctName', 'bactCBkLedg', 'bactPayable1', 'bactPayable2', 'bactPayable3', 'bactPayable4', 'bactPayable5', 'bactPayable6'], 'safe'],
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
        $query = AcctBankaccts::find();

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
            'bactVoucher' => $this->bactVoucher,
            'bactReceipt' => $this->bactReceipt,
            'bactJournal' => $this->bactJournal,
        ]);

        $query->andFilterWhere(['like', 'bactAcctCode', $this->bactAcctCode])
            ->andFilterWhere(['like', 'bactBankCode', $this->bactBankCode])
            ->andFilterWhere(['like', 'bactBankName', $this->bactBankName])
            ->andFilterWhere(['like', 'bactAcctNo', $this->bactAcctNo])
            ->andFilterWhere(['like', 'bactAcctName', $this->bactAcctName])
            ->andFilterWhere(['like', 'bactCBkLedg', $this->bactCBkLedg])
            ->andFilterWhere(['like', 'bactPayable1', $this->bactPayable1])
            ->andFilterWhere(['like', 'bactPayable2', $this->bactPayable2])
            ->andFilterWhere(['like', 'bactPayable3', $this->bactPayable3])
            ->andFilterWhere(['like', 'bactPayable4', $this->bactPayable4])
            ->andFilterWhere(['like', 'bactPayable5', $this->bactPayable5])
            ->andFilterWhere(['like', 'bactPayable6', $this->bactPayable6]);

        return $dataProvider;
    }
}
