<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayFields;

/**
 * PayFieldsSearch represents the model behind the search form of `app\models\PayFields`.
 */
class PayFieldsSearch extends PayFields
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fldType'], 'integer'],
            [['fldCode', 'fldName', 'fldCat'], 'safe'],
            [['fldUPF', 'fldETF'], 'boolean'],
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
        $query = PayFields::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fldUPF' => $this->fldUPF,
            'fldETF' => $this->fldETF,
            'fldType' => $this->fldType,
        ]);

        $query->andFilterWhere(['like', 'fldCode', $this->fldCode])
            ->andFilterWhere(['like', 'fldName', $this->fldName])
            ->andFilterWhere(['like', 'fldCat', $this->fldCat]);

        return $dataProvider;
    }
}
