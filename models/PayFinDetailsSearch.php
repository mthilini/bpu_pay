<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayFinDetails;

/**
 * PayFinDetailsSearch represents the model behind the search form of `app\models\PayFinDetails`.
 */
class PayFinDetailsSearch extends PayFinDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'medicalFundContributor', 'taxConsent'], 'integer'],
            [['nic', 'title', 'surname', 'initials', 'epfNo', 'salaryBankCode', 'bankAccountNo', 'bankAccountName', 'applicableTaxTable', 'bankLoanReleaseDate', 'otherInfo'], 'safe'],
            [['bankLoanAmount'], 'number'],
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
        $query = PayFinDetails::find();

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
            'medicalFundContributor' => $this->medicalFundContributor,
            'taxConsent' => $this->taxConsent,
            'bankLoanAmount' => $this->bankLoanAmount,
            'bankLoanReleaseDate' => $this->bankLoanReleaseDate,
        ]);

        $query->andFilterWhere(['like', 'nic', $this->nic])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'initials', $this->initials])
            ->andFilterWhere(['=', 'epfNo', $this->epfNo])
            ->andFilterWhere(['like', 'salaryBankCode', $this->salaryBankCode])
            ->andFilterWhere(['like', 'bankAccountNo', $this->bankAccountNo])
            ->andFilterWhere(['like', 'bankAccountName', $this->bankAccountName])
            ->andFilterWhere(['like', 'applicableTaxTable', $this->applicableTaxTable])
            ->andFilterWhere(['like', 'otherInfo', $this->otherInfo]);

        return $dataProvider;
    }
}
