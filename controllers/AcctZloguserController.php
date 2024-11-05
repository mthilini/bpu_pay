<?php

namespace app\controllers;

use app\models\AcctZloguserSearch;
use Yii;
use yii\data\ActiveDataProvider;

class AcctZloguserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport()
    {

        $searchModel = new AcctZloguserSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();

        $query->orderBy([
            'loguDate' => SORT_ASC,
        ]);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
        ]);
    }
}
