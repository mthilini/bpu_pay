<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctMaincash;

/**
 * AcctMaincashSearch represents the model behind the search form of `app\models\AcctMaincash`.
 */
class AcctMaincashSearch extends AcctMaincash
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mainVchRct'], 'integer'],
            [['mainAmount', 'mainDeduct'], 'number'],
            [['mainDate', 'lsubDesc', 'mainSub', 'mainCat', 'mainCashBk', 'mainType', 'mainRmks', 'mainChqCan', 'mainChqPrc', 'mainPayRct', 'mainName'], 'safe'],
            [['mainVchRct', 'mainSub', 'mainType'], 'unique']
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
        $query = AcctMaincash::find();
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
            'mainDeduct' => $this->mainDeduct,
        ]);

        $query->andFilterWhere(['like', 'mainSub', $this->mainSub])
            ->andFilterWhere(['like', 'mainCat', $this->mainCat])
            ->andFilterWhere(['like', 'mainCashBk', $this->mainCashBk])
            ->andFilterWhere(['like', 'mainType', $this->mainType])
            ->andFilterWhere(['like', 'mainRmks', $this->mainRmks])
            ->andFilterWhere(['like', 'mainChqCan', $this->mainChqCan])
            ->andFilterWhere(['like', 'mainChqPrc', $this->mainChqPrc])
            ->andFilterWhere(['like', 'mainPayRct', $this->mainPayRct])
            ->andFilterWhere(['like', 'mainName', $this->mainName]);

        return $dataProvider;
    }
}
