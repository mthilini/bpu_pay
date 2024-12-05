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
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['empUPFNo', 'semlRef', 'semlFld', 'semlStart', 'semlEnd'], 'safe'],
            [['semlAmt'], 'number'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PaySeml::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'semlStart' => $this->semlStart,
            'semlEnd' => $this->semlEnd,
            'semlAmt' => $this->semlAmt,
            'empUPFNo' => $this->empUPFNo,
        ]);

        $query->andFilterWhere(['like', 'semlRef', $this->semlRef])
            ->andFilterWhere(['like', 'semlFld', $this->semlFld]);

        return $dataProvider;
    }
}
