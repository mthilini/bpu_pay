<?php

namespace app\controllers;

use app\models\AcctBankaccts;
use app\models\AcctBankacctsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;

/**
 * AcctBankacctsController implements the CRUD actions for AcctBankaccts model.
 */
class AcctBankacctsController extends Controller
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
     * Lists all AcctBankaccts models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcctBankacctsSearch();
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
                'query' => AcctBankaccts::find(),
                //'applyOrder' => function ($query, $columns, $order) {
                //    //custom ordering logic
                //    $orderBy = [];
                //    foreach ($order as $orderItem) {
                //        $orderBy[$columns[$orderItem['column']]['data']] = $orderItem['dir'] == 'asc' ? SORT_ASC : SORT_DESC;
                //    }
                //    return $query->orderBy($orderBy);
                //},
                //'applyFilter' => function ($query, $columns, $search) {
                //    //custom search logic
                //    $modelClass = $query->modelClass;
                //    $schema = $modelClass::getTableSchema()->columns;
                //    foreach ($columns as $column) {
                //        if ($column['searchable'] == 'true' && array_key_exists($column['data'], $schema) !== false) {
                //            $value = empty ($search['value']) ? $column['search']['value'] : $search['value'];
                //            $query->orFilterWhere(['like', $column['data'], $value]);
                //        }
                //    }
                //    return $query;
                //},
            ],
        ];
    }

    /**
     * Displays a single AcctBankaccts model.
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
     * Creates a new AcctBankaccts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcctBankaccts();

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
     * Updates an existing AcctBankaccts model.
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
     * Deletes an existing AcctBankaccts model.
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
     * Finds the AcctBankaccts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcctBankaccts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcctBankaccts::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
