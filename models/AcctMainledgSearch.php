<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctMainledg;

/**
 * AcctMainledgSearch represents the model behind the search form of `app\models\AcctMainledg`.
 */
class AcctMainledgSearch extends AcctMainledg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mainVchRct'], 'integer'],
            [['mainAmount'], 'number'],
            [['mainDate', 'mainLedg', 'mainSub', 'mainCat', 'mainCashBk', 'mainRmks', 'mainDept', 'mainPayRct'], 'safe'],
            [['mainVchRct', 'mainSub'], 'unique']
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
        $query = AcctMainledg::find()->innerJoinWith('acctLedgerDesc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'mainDate' => $this->mainDate,
            'mainVchRct' => $this->mainVchRct,
        ]);

        $query->andFilterWhere(['like', 'mainSub', $this->mainSub])
            ->andFilterWhere(['like', 'mainCat', $this->mainCat])
            ->andFilterWhere(['like', 'mainCashBk', $this->mainCashBk])
            ->andFilterWhere(['like', 'mainRmks', $this->mainRmks])
            ->andFilterWhere(['like', 'mainPayRct', $this->mainPayRct])
            ->andFilterWhere(['like', 'mainDept', $this->mainDept]);

        return $dataProvider;
    }
}
