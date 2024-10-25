<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctRctsledg;

/**
 * AcctRctsledgSearch represents the model behind the search form of `app\models\AcctRctsledg`.
 */
class AcctRctsledgSearch extends AcctRctsledg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rctNo'], 'integer'],
            [['rctDate', 'rctSub', 'rctLedger', 'rctRmks', 'rctCashBk', 'rctDept'], 'safe'],
            [['rctAmount'], 'number'],
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
        $query = AcctRctsledg::find()->innerJoinWith('acctLedgerDesc');

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
            'rctDate' => $this->rctDate,
            'rctNo' => $this->rctNo,
            'rctAmount' => $this->rctAmount,
        ]);

        $query->andFilterWhere(['like', 'rctSub', $this->rctSub])
            ->andFilterWhere(['like', 'rctLedger', $this->rctLedger])
            ->andFilterWhere(['like', 'rctRmks', $this->rctRmks])
            ->andFilterWhere(['like', 'rctCashBk', $this->rctCashBk])
            ->andFilterWhere(['like', 'rctDept', $this->rctDept]);

        return $dataProvider;
    }
}
