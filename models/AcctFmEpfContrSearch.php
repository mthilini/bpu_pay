<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctFmEpfContr;

/**
 * PayFmEpfContrSearch represents the model behind the search form of `app\models\AcctFmEpfContr`.
 */
class AcctFmEpfContrSearch extends AcctFmEpfContr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['empUPFNo', 'epfYear'], 'safe'],
            [['epfBalStart', 'epfJan10', 'epfJan15', 'epfFeb10', 'epfFeb15', 'epfMar10', 'epfMar15', 'epfApr10', 'epfApr15', 'epfMay10', 'epfMay15', 'epfJun10', 'epfJun15', 'epfJul10', 'epfJul15', 'epfAug10', 'epfAug15', 'epfSep10', 'epfSep15', 'epfOct10', 'epfOct15', 'epfNov10', 'epfNov15', 'epfDec10', 'epfDec15', 'epfIntrRate', 'epfInterest', 'epfBalEnd'], 'number'],
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
        $query = AcctFmEpfContr::find();

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
            'epfBalStart' => $this->epfBalStart,
            'epfJan10' => $this->epfJan10,
            'epfJan15' => $this->epfJan15,
            'epfFeb10' => $this->epfFeb10,
            'epfFeb15' => $this->epfFeb15,
            'epfMar10' => $this->epfMar10,
            'epfMar15' => $this->epfMar15,
            'epfApr10' => $this->epfApr10,
            'epfApr15' => $this->epfApr15,
            'epfMay10' => $this->epfMay10,
            'epfMay15' => $this->epfMay15,
            'epfJun10' => $this->epfJun10,
            'epfJun15' => $this->epfJun15,
            'epfJul10' => $this->epfJul10,
            'epfJul15' => $this->epfJul15,
            'epfAug10' => $this->epfAug10,
            'epfAug15' => $this->epfAug15,
            'epfSep10' => $this->epfSep10,
            'epfSep15' => $this->epfSep15,
            'epfOct10' => $this->epfOct10,
            'epfOct15' => $this->epfOct15,
            'epfNov10' => $this->epfNov10,
            'epfNov15' => $this->epfNov15,
            'epfDec10' => $this->epfDec10,
            'epfDec15' => $this->epfDec15,
            'epfIntrRate' => $this->epfIntrRate,
            'epfInterest' => $this->epfInterest,
            'epfBalEnd' => $this->epfBalEnd,
        ]);

        $query->andFilterWhere(['like', 'empUPFNo', $this->empUPFNo])
            ->andFilterWhere(['like', 'epfYear', $this->epfYear]);

        return $dataProvider;
    }
}
