<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctPayhdr;

/**
 * AcctPayhdrSearch represents the model behind the search form of `app\models\AcctPayhdr`.
 */
class AcctPayhdrSearch extends AcctPayhdr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payVch'], 'integer'],
            [['payDate', 'payCashBk', 'payPrepared', 'payDatePrepare', 'payCertify', 'payDateCertify', 'payAuthorise', 'payDateAuthorise'], 'safe'],
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
        $query = AcctPayhdr::find();

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
            'payDatePrepare' => $this->payDatePrepare,
            'payDateCertify' => $this->payDateCertify,
            'payDateAuthorise' => $this->payDateAuthorise,
        ]);

        $query->andFilterWhere(['like', 'payCashBk', $this->payCashBk])
            ->andFilterWhere(['like', 'payPrepared', $this->payPrepared])
            ->andFilterWhere(['like', 'payCertify', $this->payCertify])
            ->andFilterWhere(['like', 'payAuthorise', $this->payAuthorise]);

        return $dataProvider;
    }
}
