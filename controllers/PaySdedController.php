<?php

namespace app\controllers;

use app\models\PaySded;
use app\models\PaySdedSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaySdedController implements the CRUD actions for PaySded model.
 */
class PaySdedController extends Controller
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
     * Lists all PaySded models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PaySdedSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaySded model.
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
     * Creates a new PaySded model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PaySded();

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
     * Updates an existing PaySded model.
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
     * Deletes an existing PaySded model.
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
     * Finds the PaySded model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PaySded the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaySded::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionReport()
    {
        $searchModel = new PaySdedSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'sdedStart', $request['from'], $request['to']])
                        ->andFilterWhere(['between', 'sdedEnd', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['a_min']) && !empty($request['a_max'])) {
                if (is_numeric($request['a_min']) && is_numeric($request['a_max']))
                    $query->andFilterWhere(['between', 'sdedAmt', $request['a_min'], $request['a_max']]);
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
