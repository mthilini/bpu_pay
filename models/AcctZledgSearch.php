<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctZledg;

/**
 * AcctZledgSearch represents the model behind the search form of `app\models\AcctZledg`.
 */
class AcctZledgSearch extends AcctZledg
{

    public function rules()
    {
        return [
            [['zledgCode', 'zledgDesc'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctZledg::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'zledgCode', $this->zledgCode])
            ->andFilterWhere(['like', 'zledgDesc', $this->zledgDesc]);

        return $dataProvider;
    }

}
