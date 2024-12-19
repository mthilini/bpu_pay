<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayPayhd;

/**
 * PayPayhdSearch represents the model behind the search form of `app\models\PayPayhd`.
 */
class PayPayhdSearch extends PayPayhd
{
    public function rules()
    {
        return [
            [['empBasic', 'empLoanAmt'], 'number'],
            [['empDtAppt', 'empDtAssm', 'empDtIncr', 'empDtConf', 'empDtBirth', 'empDtTemp', 'empLoanDate', 'empNIC', 'empTitle', 'empAddress3', 'empSurname', 'empAddress1', 'empAddress2', 'empInitials', 'empAcctNo', 'empNames', 'empGender', 'empUPContr', 'empStatus', 'empAcademic', 'empTempEmp', 'empGrade', 'empResearch', 'empTax', 'empTaxTbl', 'empDept', 'empDesig', 'empSalCode', 'empUPFNo', 'empETFNo', 'empUPNo', 'empSalScale', 'empBankCode', 'empAcctName'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PayPayhd::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'empBasic' => $this->empBasic,
            'empLoanAmt' => $this->empLoanAmt,
        ]);

        $query->andFilterWhere(['like', 'empDtAppt', $this->empDtAppt])
            ->andFilterWhere(['like', 'empDtAssm', $this->empDtAssm])
            ->andFilterWhere(['like', 'empDtIncr', $this->empDtIncr])
            ->andFilterWhere(['like', 'empDtConf', $this->empDtConf])
            ->andFilterWhere(['like', 'empDtBirth', $this->empDtBirth])
            ->andFilterWhere(['like', 'empDtTemp', $this->empDtTemp])
            ->andFilterWhere(['like', 'empLoanDate', $this->empLoanDate])
            ->andFilterWhere(['like', 'empNIC', $this->empNIC])
            ->andFilterWhere(['like', 'empTitle', $this->empTitle])
            ->andFilterWhere(['like', 'empAddress3', $this->empAddress3])
            ->andFilterWhere(['like', 'empSurname', $this->empSurname])
            ->andFilterWhere(['like', 'empAddress1', $this->empAddress1])
            ->andFilterWhere(['like', 'empAddress2', $this->empAddress2])
            ->andFilterWhere(['like', 'empInitials', $this->empInitials])
            ->andFilterWhere(['like', 'empAcctNo', $this->empAcctNo])
            ->andFilterWhere(['like', 'empNames', $this->empNames])
            ->andFilterWhere(['like', 'empGender', $this->empGender])
            ->andFilterWhere(['like', 'empUPContr', $this->empUPContr])
            ->andFilterWhere(['like', 'empStatus', $this->empStatus])
            ->andFilterWhere(['like', 'empAcademic', $this->empAcademic])
            ->andFilterWhere(['like', 'empTempEmp', $this->empTempEmp])
            ->andFilterWhere(['like', 'empGrade', $this->empGrade])
            ->andFilterWhere(['like', 'empResearch', $this->empResearch])
            ->andFilterWhere(['like', 'empTax', $this->empTax])
            ->andFilterWhere(['like', 'empTaxTbl', $this->empTaxTbl])
            ->andFilterWhere(['like', 'empDept', $this->empDept])
            ->andFilterWhere(['like', 'empDesig', $this->empDesig])
            ->andFilterWhere(['like', 'empSalCode', $this->empSalCode])
            ->andFilterWhere(['like', 'empUPFNo', $this->empUPFNo])
            ->andFilterWhere(['like', 'empETFNo', $this->empETFNo])
            ->andFilterWhere(['like', 'empUPNo', $this->empUPNo])
            ->andFilterWhere(['like', 'empSalScale', $this->empSalScale])
            ->andFilterWhere(['like', 'empBankCode', $this->empBankCode])
            ->andFilterWhere(['like', 'empAcctName', $this->empAcctName]);

        return $dataProvider;
    }
}
