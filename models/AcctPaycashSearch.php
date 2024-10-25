<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctPaycash;

/**
 * AcctPaycashSearch represents the model behind the search form of `app\models\AcctPaycash`.
 */
class AcctPaycashSearch extends AcctPaycash
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payVch'], 'integer'],
            [['payDate', 'paySub', 'payType', 'payRmks', 'payCashBk', 'payPayee'], 'safe'],
            [['payAmount', 'payDeduct'], 'number'],
            [['payVch', 'paySub', 'payType'], 'unique'],
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
        $query = AcctPaycash::find();

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
            'payDate' => $this->payDate,
            'payVch' => $this->payVch,
            'payAmount' => $this->payAmount,
            'payDeduct' => $this->payDeduct,
        ]);

        $query->andFilterWhere(['like', 'paySub', $this->paySub])
            ->andFilterWhere(['like', 'payType', $this->payType])
            ->andFilterWhere(['like', 'payRmks', $this->payRmks])
            ->andFilterWhere(['like', 'payCashBk', $this->payCashBk])
            ->andFilterWhere(['like', 'payPayee', $this->payPayee]);

        return $dataProvider;
    }
}
