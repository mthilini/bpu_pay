<?php

namespace app\controllers;

use Yii;
use app\models\AcctJnlhdrSearch;
use yii\web\Controller;

use yii\data\ActiveDataProvider;

/**
 * AcctJnlhdrController implements the CRUD actions for AcctPayhdr model.
 */
class AcctJnlhdrController extends Controller
{

    public function actionReport()
    {

        $searchModel = new AcctJnlhdrSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();

        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
        ]);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
        ]);
    }
}
