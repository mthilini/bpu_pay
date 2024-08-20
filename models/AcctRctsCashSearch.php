<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctRctsCash;

/**
 * AcctRctsCashSearch represents the model behind the search form of `app\models\AcctRctsCash`.
 */
class AcctRctsCashSearch extends AcctRctsCash
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rctNo'], 'integer'],
            [['rctDate', 'rctSub', 'rctType', 'rctName', 'rctRmks', 'rctCashBk'], 'safe'],
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
        $query = AcctRctsCash::find();

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
            ->andFilterWhere(['like', 'rctType', $this->rctType])
            ->andFilterWhere(['like', 'rctName', $this->rctName])
            ->andFilterWhere(['like', 'rctRmks', $this->rctRmks])
            ->andFilterWhere(['like', 'rctCashBk', $this->rctCashBk]);

        return $dataProvider;
    }
}
