<?php

namespace app\controllers;

use app\models\AcctBankaccts;
use Yii;
use app\models\AcctRctshdrSearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;

use yii\data\ActiveDataProvider;

/**
 * AcctRctshdrController implements the CRUD actions for AcctPayhdr model.
 */
class AcctRctshdrController extends Controller
{

    public function actionReport()
    {

        $searchModel = new AcctRctshdrSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();

        $query->orderBy([
            'rctDate' => SORT_ASC,
            'rctNo' => SORT_ASC,
        ]);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
        ]);
    }
}
