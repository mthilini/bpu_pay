<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PayDept;

/**
 * PayDeptSearch represents the model behind the search form of `app\models\PayDept`.
 */
class PayDeptSearch extends PayDept
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deptCode', 'deptName', 'deptProj', 'deptProg', 'deptUPF'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params)
    {
        $query = PayDept::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'deptCode' => $this->deptCode,
            'deptProj' => $this->deptProj,
            'deptProg' => $this->deptProg,
        ]);

        $query->andFilterWhere(['like', 'deptName', $this->deptName])
            ->andFilterWhere(['like', 'deptUPF', $this->deptUPF]);

        return $dataProvider;
    }
}
