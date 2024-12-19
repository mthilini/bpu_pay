<?php

namespace app\controllers;

use app\models\PayFields;
use app\models\PayFieldsSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PayFieldsController implements the CRUD actions for PayFields model.
 */
class PayFieldsController extends Controller
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
     * Lists all PayFields models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PayFieldsSearch();
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
                'query' => PayFields::find()->innerJoinWith('payFieldType'),
                'applyOrder' => function ($query, $columns, $order) {
                    //custom ordering logic
                    $orderBy = [];
                    foreach ($order as $orderItem) {
                        if ($columns[$orderItem['column']]['data'] == 'payFieldType.typeName') {
                            $orderBy['pay_fieldType.typeName'] = $orderItem['dir'] == 'asc' ? SORT_ASC : SORT_DESC;
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
                        if ($column['searchable'] == 'true' && (array_key_exists($column['data'], $schema) !== false || $column['data'] == 'payFieldType.typeName')) {
                            $value = empty($search['value']) ? $column['search']['value'] : $search['value'];

                            if ($column['data'] == 'payFieldType.typeName') {
                                $query->andFilterWhere(['like', 'pay_fieldType.typeName', $value]);
                            } else if (($column['data'] == 'fldUPF' || $column['data'] == 'fldETF') && ($value == '0' || $value == '1')) {
                                $query->andFilterWhere(['=', $column['data'], $value]);
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
     * Displays a single PayFields model.
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
     * Creates a new PayFields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PayFields();

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
     * Updates an existing PayFields model.
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
     * Deletes an existing PayFields model.
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
     * Finds the PayFields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PayFields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PayFields::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport()
    {

        $searchModel = new PayFieldsSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $query->orderBy([
            'fldCode' => SORT_ASC
        ]);

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}
