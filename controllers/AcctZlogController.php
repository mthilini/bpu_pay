<?php

namespace app\controllers;

use app\models\AcctZlogSearch;
use Yii;
use yii\data\ActiveDataProvider;

class AcctZlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport()
    {

        $searchModel = new AcctZlogSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();

        $query->orderBy([
            'logDate' => SORT_ASC,
            'logVchRct' => SORT_ASC,
            'logSub' => SORT_ASC
        ]);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
        ]);
    }
}
