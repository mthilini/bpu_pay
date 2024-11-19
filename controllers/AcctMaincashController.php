<?php

namespace app\controllers;

use app\models\AcctBankaccts;
use app\models\AcctMaincash;
use app\models\AcctMaincashSearch;
use app\models\Common;
use DateTime;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AcctMaincashController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AcctMaincash models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcctMaincashSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcctMaincash model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AcctMaincash model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcctMaincash();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AcctMaincash model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AcctMaincash model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AcctMaincash model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcctMaincash the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcctMaincash::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport()
    {

        $searchModel = new AcctMaincashSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $openingBalance = 0.00;
        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'mainDate', $request['from'], $request['to']]);

                    $from = $request['from'];
                    $fromDate = date($from);
                    $year = date('Y', strtotime($fromDate));
                    $yearStartDate = date($year . '-01-01');

                    $preYear = intval($year) - 1;

                    $model = new Common();
                    $yrParams = [
                        'year' => $preYear,
                        'table' => 'acct_cashbal',
                        'sum' => 'balClosing',
                        'field' => 'balDate'
                    ];
                    if (!empty($request['cashbook'])) {
                        $yrParams['cashbookColumn'] = 'balCashBk';
                        $yrParams['cashbook'] = $request['cashbook'];
                    }
                    $preYearBalance = $model->getTotalClosingYearEndBalance($yrParams);

                    $preyearTotClosingBalance = !empty($preYearBalance) ? $preYearBalance : 0.00;

                    if ($fromDate == $yearStartDate) {
                        $openingBalance = $preyearTotClosingBalance;
                    } else {
                        $date = new DateTime($fromDate);
                        $to = $date->modify("-1 days")->format('Y-m-d');

                        $pParams = [
                            'from' => $yearStartDate,
                            'to' => $to,
                            'table' => 'acct_maincash',
                            'check' => 'mainPayRct',
                            'field' => 'mainAmount',
                            'dateField' => 'mainDate',
                        ];
                        if (!empty($request['cashbook'])) {
                            $pParams['cashbookColumn'] = 'mainCashBk';
                            $pParams['cashbook'] = $request['cashbook'];
                        }

                        $preBalance = $model->getPreviousBalance($pParams);
                        $preTotClosingBalance = !empty($preBalance) ? $preBalance : 0.00;

                        $openingBalance = $preyearTotClosingBalance + $preTotClosingBalance;
                    }
                }
            }

            if (!empty($request['cashbook'])) {
                $query->andFilterWhere([
                    'mainCashBk' => $request['cashbook']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'mainDate' => SORT_ASC,
            'mainVchRct' => SORT_ASC,
            'mainSub' => SORT_ASC
        ]);

        $cashbookItems = ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctCode')->all(), 'id', 'bactAcctCode');

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'openingBalance' => $openingBalance,
            'cashbooks' => $cashbookItems
        ]);
    }
}
