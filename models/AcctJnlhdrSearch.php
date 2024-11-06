<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctJnlhdr;

/**
 * AcctJnlhdrSearch represents the model behind the search form of `app\models\AcctJnlhdr`.
 */
class AcctJnlhdrSearch extends AcctJnlhdr
{

    public function rules()
    {
        return [
            [['id', 'jnlNo'], 'integer'],
            [['jnlDate', 'jnlDatePrepare', 'jnlDateCertify', 'jnlDateAuthorise', 'jnlCashBk', 'jnlPrepared', 'jnlCertify', 'jnlAuthorise'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctJnlhdr::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'jnlDate' => $this->jnlDate,
            'jnlDateCertify' => $this->jnlDateCertify,
            'jnlDatePrepare' => $this->jnlDatePrepare,
            'jnlDateAuthorise' => $this->jnlDateAuthorise,
        ]);

        $query->andFilterWhere(['like', 'jnlCashBk', $this->jnlCashBk])
            ->andFilterWhere(['like', 'jnlPrepared', $this->jnlPrepared])
            ->andFilterWhere(['like', 'jnlCertify', $this->jnlCertify])
            ->andFilterWhere(['like', 'jnlAuthorise', $this->jnlAuthorise]);

        return $dataProvider;
    }
}
