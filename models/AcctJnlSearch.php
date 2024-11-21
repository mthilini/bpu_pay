<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctJnl;

/**
 * AcctJnlSearch represents the model behind the search form of `app\models\AcctJnl`.
 */
class AcctJnlSearch extends AcctJnl
{

    public function rules()
    {
        return [
            [['id', 'jnlNo'], 'integer'],
            [['jnlAmount'], 'number'],
            [['jnlDate', 'jnlSub', 'jnlCat', 'jnlCashBk', 'jnlLedg', 'jnlRmks', 'jnlPayRct', 'jnlDept'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctJnl::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'jnlDate' => $this->jnlDate,
            'jnlAmount' => $this->jnlAmount,
        ]);

        $query->andFilterWhere(['like', 'jnlSub', $this->jnlSub])
            ->andFilterWhere(['like', 'jnlCat', $this->jnlCat])
            ->andFilterWhere(['like', 'jnlCashBk', $this->jnlCashBk])
            ->andFilterWhere(['like', 'jnlRmks', $this->jnlRmks])
            ->andFilterWhere(['like', 'jnlPayRct', $this->jnlPayRct])
            ->andFilterWhere(['like', 'jnlDept', $this->jnlDept])
            ->andFilterWhere(['like', 'jnlLedg', $this->jnlLedg]);

        return $dataProvider;
    }

    public function vsearch($params)
    {
        $query = AcctJnl::find()->innerJoinWith('acctVoteDesc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'jnlDate' => $this->jnlDate,
            'jnlAmount' => $this->jnlAmount,
        ]);

        $query->andFilterWhere(['like', 'jnlSub', $this->jnlSub])
            ->andFilterWhere(['like', 'jnlCat', $this->jnlCat])
            ->andFilterWhere(['like', 'jnlCashBk', $this->jnlCashBk])
            ->andFilterWhere(['like', 'jnlRmks', $this->jnlRmks])
            ->andFilterWhere(['like', 'jnlPayRct', $this->jnlPayRct])
            ->andFilterWhere(['like', 'jnlDept', $this->jnlDept])
            ->andFilterWhere(['like', 'jnlLedg', $this->jnlLedg]);

        return $dataProvider;
    }

    public function lsearch($params)
    {
        $query = AcctJnl::find()->innerJoinWith('acctLedgerDesc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'jnlDate' => $this->jnlDate,
            'jnlAmount' => $this->jnlAmount,
        ]);

        $query->andFilterWhere(['like', 'jnlSub', $this->jnlSub])
            ->andFilterWhere(['like', 'jnlCat', $this->jnlCat])
            ->andFilterWhere(['like', 'jnlCashBk', $this->jnlCashBk])
            ->andFilterWhere(['like', 'jnlRmks', $this->jnlRmks])
            ->andFilterWhere(['like', 'jnlPayRct', $this->jnlPayRct])
            ->andFilterWhere(['like', 'jnlDept', $this->jnlDept])
            ->andFilterWhere(['like', 'jnlLedg', $this->jnlLedg]);

        return $dataProvider;
    }

    public function zsearch($params)
    {
        $query = AcctJnl::find()->innerJoinWith('acctZledgDesc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'jnlDate' => $this->jnlDate,
            'jnlAmount' => $this->jnlAmount,
        ]);

        $query->andFilterWhere(['like', 'jnlSub', $this->jnlSub])
            ->andFilterWhere(['like', 'jnlCat', $this->jnlCat])
            ->andFilterWhere(['like', 'jnlCashBk', $this->jnlCashBk])
            ->andFilterWhere(['like', 'jnlRmks', $this->jnlRmks])
            ->andFilterWhere(['like', 'jnlPayRct', $this->jnlPayRct])
            ->andFilterWhere(['like', 'jnlDept', $this->jnlDept])
            ->andFilterWhere(['like', 'jnlLedg', $this->jnlLedg]);

        return $dataProvider;
    }
}
