<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctRctshdr;

/**
 * AcctRctshdrSearch represents the model behind the search form of `app\models\AcctRctshdr`.
 */
class AcctRctshdrSearch extends AcctRctshdr
{

    public function rules()
    {
        return [
            [['id', 'rctNo'], 'integer'],
            [['rctDate', 'rctCashBk', 'rctPrepared', 'rctDatePrepare', 'rctCertify', 'rctDateCertify', 'rctAuthorise', 'rctDateAuthorise'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctRctshdr::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'rctDate' => $this->rctDate,
            'rctNo' => $this->rctNo,
            'rctDatePrepare' => $this->rctDatePrepare,
            'rctDateCertify' => $this->rctDateCertify,
            'rctDateAuthorise' => $this->rctDateAuthorise,
        ]);

        $query->andFilterWhere(['like', 'rctCashBk', $this->rctCashBk])
            ->andFilterWhere(['like', 'rctPrepared', $this->rctPrepared])
            ->andFilterWhere(['like', 'rctCertify', $this->rctCertify])
            ->andFilterWhere(['like', 'rctAuthorise', $this->rctAuthorise]);

        return $dataProvider;
    }
}
