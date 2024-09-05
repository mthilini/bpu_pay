<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaySa5;

/**
 * PaySa5Search represents the model behind the search form of `app\models\PaySa5`.
 */
class PaySa5Search extends PaySa5
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['empUPFNo', 'sa5Ref', 'sa5Fld', 'sa5Start', 'sa5End'], 'safe'],
            [['sa5Amt'], 'number'],
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
        $query = PaySa5::find();

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
            'sa5Start' => $this->sa5Start,
            'sa5End' => $this->sa5End,
            'sa5Amt' => $this->sa5Amt,
        ]);

        $query->andFilterWhere(['like', 'empUPFNo', $this->empUPFNo])
            ->andFilterWhere(['like', 'sa5Ref', $this->sa5Ref])
            ->andFilterWhere(['like', 'sa5Fld', $this->sa5Fld]);

        return $dataProvider;
    }
}
