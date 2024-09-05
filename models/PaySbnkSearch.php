<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaySbnk;

/**
 * PaySbnkSearch represents the model behind the search form of `app\models\PaySbnk`.
 */
class PaySbnkSearch extends PaySbnk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['empUPFNo', 'sbnkRef', 'sbnkStart', 'sbnkEnd', 'sbnkBank', 'sbnkAcct', 'sbnkAName', 'sbnkLoan'], 'safe'],
            [['sbnkAmt'], 'number'],
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
        $query = PaySbnk::find();

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
            'sbnkStart' => $this->sbnkStart,
            'sbnkEnd' => $this->sbnkEnd,
            'sbnkAmt' => $this->sbnkAmt,
        ]);

        $query->andFilterWhere(['=', 'empUPFNo', $this->empUPFNo])
            ->andFilterWhere(['like', 'sbnkRef', $this->sbnkRef])
            ->andFilterWhere(['like', 'sbnkBank', $this->sbnkBank])
            ->andFilterWhere(['like', 'sbnkAcct', $this->sbnkAcct])
            ->andFilterWhere(['like', 'sbnkAName', $this->sbnkAName])
            ->andFilterWhere(['like', 'sbnkLoan', $this->sbnkLoan]);

        return $dataProvider;
    }
}
