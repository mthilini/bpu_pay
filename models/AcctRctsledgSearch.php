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
        $query = AcctRctsledg::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

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
