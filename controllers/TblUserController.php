<?php

namespace app\controllers;

use app\models\TblUser;
use app\models\TblUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblUserController implements the CRUD actions for TblUser model.
 */
class TblUserController extends Controller
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
     * Lists all TblUser models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TblUserSearch();
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
                'query' => TblUser::find(),
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
     * Displays a single TblUser model.
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
     * Creates a new TblUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblUser();

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
     * Updates an existing TblUser model.
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
     * Deletes an existing TblUser model.
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
     * Finds the TblUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblUser::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //
    //
    public function actionAssignPages()
    {
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $duallistbox_demo1 = $data['duallistbox_demo1'];
            $roleID  = \Yii::$app->session['roleID'];
        }
        //echo "Success-roleID-$roleID.<br>";
        //
        if ($roleID == "Sys_Admin") { //skipping changes to sys_admin
            return $this->redirect(['admin/role']);
        }
        //first remove the existing items for this role in the table
        $authChildDelSql = "delete from auth_item_child where parent='$roleID'";
        \Yii::$app->db->createCommand($authChildDelSql)->execute();
        //
        //add newly assigned items to the table under this role
        foreach ($duallistbox_demo1 as $value) {
            //echo "$value <br>";
            //add newly assigned items to the table under this role
            $authChildAddSql = "insert into auth_item_child (parent,child) values('$roleID','$value')";
            \Yii::$app->db->createCommand($authChildAddSql)->execute();
        }
        return $this->redirect(['admin/role']);
    }
    //
    //
    public function beforeAction($action)
    {
        if ($action->id == 'assign-pages') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    //
}
