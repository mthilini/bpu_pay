<?php

namespace app\controllers;

use app\models\AcctPayledg;
use app\models\AcctPayledgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//
use \app\models\AcctLedger;
use \app\models\AcctLedgerSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * AcctPayledgController implements the CRUD actions for AcctPayledg model.
 */
class AcctPayledgController extends Controller
{
    /**
     * @inheritDoc
     */
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
        $searchModel = new AcctPayledgSearch();
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
                'query' => AcctPayledg::find(),
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
        $model = new AcctPayledg();

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
        if (($model = AcctPayledg::findOne(['id' => $id])) !== null) {
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

    public function actionReport()
    {

        $searchModel = new AcctPayledgSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'payDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['ledger'])) {
                $query->andFilterWhere([
                    'payLedg' => $request['ledger']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'payDate' => SORT_ASC,
            'payVch' => SORT_ASC,
            'paySub' => SORT_ASC
        ]);

        $ledgerItems = ArrayHelper::map(AcctLedger::find()->orderBy('ledgCode')->all(), 'id', 'ledgCode');

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }
}
