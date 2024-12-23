<?php

namespace app\controllers;

use app\models\AcctBankaccts;
use app\models\AcctLedger;
use app\models\AcctMainledg;
use app\models\AcctMainledgSearch;
use app\models\AcctVotes;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AcctMainledgController extends Controller
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
     * Lists all AcctPayledg models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcctMainledgSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actions()
    {
        return [
            'datatables' => [
                'class' => 'nullref\datatable\DataTableAction',
                'query' => AcctMainledg::find(),
                'applyOrder' => function ($query, $columns, $order) {
                    //custom ordering logic
                    $orderBy = [];
                    foreach ($order as $orderItem) {
                        $orderBy[$columns[$orderItem['column']]['data']] = $orderItem['dir'] == 'asc' ? SORT_ASC : SORT_DESC;
                    }
                    return $query->orderBy($orderBy);
                },
                'applyFilter' => function ($query, $columns, $search) {
                    //custom search logic
                    $modelClass = $query->modelClass;
                    $schema = $modelClass::getTableSchema()->columns;
                    foreach ($columns as $column) {
                        if ($column['searchable'] == 'true' && array_key_exists($column['data'], $schema) !== false) {
                            $value = empty($search['value']) ? $column['search']['value'] : $search['value'];
                            $query->andFilterWhere(['like', $column['data'], $value]);
                        }
                    }
                    return $query;
                },
            ],
        ];
    }

    /**
     * Displays a single AcctPayledg model.
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
     * Creates a new AcctPayledg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcctMainledg();

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
     * Updates an existing AcctPayledg model.
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
     * Deletes an existing AcctPayledg model.
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
     * Finds the AcctPayledg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcctPayledg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcctMainledg::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //
    //
    //Dependant Dropdown list for ledger-sub, filter ledger-sub according to ledgerMain
    public function actionDropdown($id)
    {
        $countPosts = \app\models\AcctLedger::find()
            ->where(['mainCode' => "$id"])
            ->count();

        $posts =  \app\models\AcctLedger::find()
            ->where(['mainCode' => "$id"])
            ->orderBy('ledgCode ASC')
            ->all();
        echo "<option value=''>-</option>";
        if ($countPosts > 0) {
            foreach ($posts as $post) {
                echo "<option value='" . $post->ledgSub . "'>" . \Yii::t('app', $post->ledgDesc) . "</option>";
            }
        }
    }

    public function actionCashReport()
    {

        $searchModel = new AcctMainledgSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'mainDate', $request['from'], $request['to']]);
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

        $query->andFilterWhere(['NOT LIKE', 'mainCashBk', 'J%', false])
            ->orderBy([
                'mainDate' => SORT_ASC,
                'mainVchRct' => SORT_ASC,
                'mainSub' => SORT_ASC
            ]);

        $cashbookItems = ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctCode')->all(), 'id', 'bactAcctCode');

        return $this->render('cash-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'cashbooks' => $cashbookItems
        ]);
    }

    public function actionLedgReport()
    {

        $searchModel = new AcctMainledgSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'mainDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['ledger'])) {
                $query->andFilterWhere([
                    'mainLedg' => $request['ledger']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->andFilterWhere(['NOT LIKE', 'mainCashBk', 'J%', false])
            ->andFilterWhere(['NOT LIKE', 'mainLedg', '%-%', false])
            ->orderBy([
                'mainDate' => SORT_ASC,
                'mainVchRct' => SORT_ASC,
                'mainSub' => SORT_ASC
            ]);

        // echo $query->createCommand()->getRawSql();
        // exit;
        $ledgersItems = ArrayHelper::map(AcctLedger::find()->orderBy('ledgCode')->all(), 'id', 'ledgCode');

        return $this->render('ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgersItems
        ]);
    }

    public function actionVoteReport()
    {

        $searchModel = new AcctMainledgSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'mainDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['vote'])) {
                $query->andFilterWhere([
                    'mainLedg' => $request['vote']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->andFilterWhere(['NOT LIKE', 'mainCashBk', 'J%', false])
            ->andFilterWhere(['LIKE', 'mainLedg', '%-%', false])
            ->orderBy([
                'mainDate' => SORT_ASC,
                'mainVchRct' => SORT_ASC,
                'mainSub' => SORT_ASC
            ]);

        $voteItems = ArrayHelper::map(AcctVotes::find()->orderBy('voteVote')->all(), 'id', 'voteVote');

        return $this->render('vote-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'votes' => $voteItems,
        ]);
    }
}
