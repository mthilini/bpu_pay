<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctVotes;

/**
 * AcctVotesSearch represents the model behind the search form of `app\models\AcctVotes`.
 */
class AcctVotesSearch extends AcctVotes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['progCode', 'projCode', 'objCode', 'voteCode', 'voteSub', 'voteVote', 'voteDesc'], 'safe'],
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
        $query = AcctVotes::find();

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
        ]);

        $query->andFilterWhere(['like', 'progCode', $this->progCode])
            ->andFilterWhere(['like', 'projCode', $this->projCode])
            ->andFilterWhere(['like', 'objCode', $this->objCode])
            ->andFilterWhere(['like', 'voteCode', $this->voteCode])
            ->andFilterWhere(['like', 'voteSub', $this->voteSub])
            ->andFilterWhere(['like', 'voteVote', $this->voteVote])
            ->andFilterWhere(['like', 'voteDesc', $this->voteDesc]);

        return $dataProvider;
    }
}
