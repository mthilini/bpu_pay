<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctZloguser;

/**
 * AcctZloguserSearch represents the model behind the search form of `app\models\AcctZloguser`.
 */
class AcctZloguserSearch extends AcctZloguser
{

    public function rules()
    {
        return [
            [['loguDate', 'loguUser', 'loguRmks', 'loguType', 'loguVersion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctZloguser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'loguDate' => $this->loguDate,
        ]);

        $query->andFilterWhere(['like', 'loguUser', $this->loguUser])
            ->andFilterWhere(['like', 'loguRmks', $this->loguRmks])
            ->andFilterWhere(['like', 'loguVersion', $this->loguVersion])
            ->andFilterWhere(['like', 'loguType', $this->loguType]);

        return $dataProvider;
    }
}
