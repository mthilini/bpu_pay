<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcctTrialdtl;

/**
 * AcctTrialdtlSearch represents the model behind the search form of `app\models\AcctTrialdtl`.
 */
class AcctTrialdtlSearch extends AcctTrialdtl
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ledgCode', 'trialdtlMonth', 'trialdtlDate', 'trialdtlTB', 'trialdtlCnf'], 'safe'],
            [['trialdtlOpening', 'trialdtlDebits', 'trialdtlCredits', 'trialdtlClosing'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = AcctTrialdtl::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'trialdtlOpening' => $this->trialdtlOpening,
            'trialdtlDebits' => $this->trialdtlDebits,
            'trialdtlCredits' => $this->trialdtlCredits,
            'trialdtlClosing' => $this->trialdtlClosing,
            'trialdtlDate' => $this->trialdtlDate,
            'trialdtlMonth' => $this->trialdtlMonth,
            'trialdtlTB' => $this->trialdtlTB,
            'trialdtlCnf' => $this->trialdtlCnf,
        ]);

        $query->andFilterWhere(['like', 'ledgCode', $this->ledgCode]);

        return $dataProvider;
    }
}
