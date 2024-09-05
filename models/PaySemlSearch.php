<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaySeml;

/**
 * PaySemlSearch represents the model behind the search form of `app\models\PaySeml`.
 */
class PaySemlSearch extends PaySeml
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['empUPFNo', 'semlRef', 'semlFld', 'semlStart', 'semlEnd'], 'safe'],
            [['semlAmt'], 'number'],
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
        $query = PaySeml::find();

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
            'semlStart' => $this->semlStart,
            'semlEnd' => $this->semlEnd,
            'semlAmt' => $this->semlAmt,
        ]);

        $query->andFilterWhere(['=', 'empUPFNo', $this->empUPFNo])
            ->andFilterWhere(['like', 'semlRef', $this->semlRef])
            ->andFilterWhere(['like', 'semlFld', $this->semlFld]);

        return $dataProvider;
    }
}
