<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctPayledg;

/**
 * AcctPayledgSearch represents the model behind the search form of `app\models\AcctPayledg`.
 */
class AcctPayledgSearch extends AcctPayledg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payVch'], 'integer'],
            [['payDate', 'paySub', 'payLedg', 'payRmks', 'payCashBk', 'payDept'], 'safe'],
            [['payAmount'], 'number'],
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
        $query = AcctPayledg::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'payDate' => $this->payDate,
            'payVch' => $this->payVch,
            'payAmount' => $this->payAmount,
        ]);

        $query->andFilterWhere(['like', 'paySub', $this->paySub])
            ->andFilterWhere(['like', 'payLedg', $this->payLedg])
            ->andFilterWhere(['like', 'payRmks', $this->payRmks])
            ->andFilterWhere(['like', 'payCashBk', $this->payCashBk])
            ->andFilterWhere(['like', 'payDept', $this->payDept]);

        return $dataProvider;
    }
}
