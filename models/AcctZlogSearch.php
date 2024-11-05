<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctZlog;

/**
 * AcctZlogSearch represents the model behind the search form of `app\models\AcctZlog`.
 */
class AcctZlogSearch extends AcctZlog
{

    public function rules()
    {
        return [
            [['logVchRct'], 'integer'],
            [['logAmount'], 'number'],
            [['logDate', 'logUser', 'logDesc', 'logSub', 'logCashBk', 'logProcess', 'logRmks', 'logVersion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctZlog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'logDate' => $this->logDate,
            'logVchRct' => $this->logVchRct,
            'logAmount' => $this->logAmount,
        ]);

        $query->andFilterWhere(['like', 'logUser', $this->logUser])
            ->andFilterWhere(['like', 'logDesc', $this->logDesc])
            ->andFilterWhere(['like', 'logCashBk', $this->logCashBk])
            ->andFilterWhere(['like', 'logProcess', $this->logProcess])
            ->andFilterWhere(['like', 'logRmks', $this->logRmks])
            ->andFilterWhere(['like', 'logVersion', $this->logVersion])
            ->andFilterWhere(['like', 'logSub', $this->logSub]);

        return $dataProvider;
    }
}
