<?php

namespace app\controllers;

use app\models\PaySa5;
use app\models\PaySa5Search;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaySa5Controller implements the CRUD actions for PaySa5 model.
 */
class PaySa5Controller extends Controller
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
     * Lists all PaySa5 models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PaySa5Search();
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
                'query' => PaySa5::find()->innerJoinWith('payA5type'),
                'applyOrder' => function ($query, $columns, $order) {
                    //custom ordering logic
                    $orderBy = [];
                    foreach ($order as $orderItem) {
                        if ($columns[$orderItem['column']]['data'] == 'payA5type.a5Desc') {
                            $orderBy['pay_a5type.a5Desc'] = $orderItem['dir'] == 'asc' ? SORT_ASC : SORT_DESC;
                        } else {
                            $orderBy[$columns[$orderItem['column']]['data']] = $orderItem['dir'] == 'asc' ? SORT_ASC : SORT_DESC;
                        }
                    }
                    return $query->orderBy($orderBy);
                },
                'applyFilter' => function ($query, $columns, $search) {
                    //custom search logic
                    $modelClass = $query->modelClass;
                    $schema = $modelClass::getTableSchema()->columns;

                    foreach ($columns as $column) {
                        if ($column['searchable'] == 'true' && (array_key_exists($column['data'], $schema) !== false || $column['data'] == 'payA5type.a5Desc')) {
                            $value = empty($search['value']) ? $column['search']['value'] : $search['value'];

                            if ($column['data'] == 'payA5type.a5Desc') {
                                $query->andFilterWhere(['like', 'pay_a5type.a5Desc', $value]);
                            } else {
                                $query->andFilterWhere(['like', $column['data'], $value]);
                            }
                        }
                    }
                    return $query;
                },
            ],
        ];
    }

    /**
     * Displays a single PaySa5 model.
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
     * Creates a new PaySa5 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PaySa5();

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
     * Updates an existing PaySa5 model.
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
     * Deletes an existing PaySa5 model.
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
     * Finds the PaySa5 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PaySa5 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaySa5::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport()
    {
        $searchModel = new PaySa5Search();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'sa5Start', $request['from'], $request['to']])
                        ->andFilterWhere(['between', 'sa5End', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['a_min']) && !empty($request['a_max'])) {
                if (is_numeric($request['a_min']) && is_numeric($request['a_max']))
                    $query->andFilterWhere(['between', 'sa5Amt', $request['a_min'], $request['a_max']]);
            }
        } else {
            $dataProvider = null;
        }


        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
        ]);
    }
}
