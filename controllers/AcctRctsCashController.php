<?php

namespace app\controllers;

use app\models\AcctBankaccts;
use app\models\AcctRctsCash;
use app\models\AcctRctsCashSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AcctRctsCashController implements the CRUD actions for AcctRctsCash model.
 */
class AcctRctsCashController extends Controller
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
     * Lists all AcctRctsCash models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcctRctsCashSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcctRctsCash model.
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
     * Creates a new AcctRctsCash model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcctRctsCash();

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
     * Updates an existing AcctRctsCash model.
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
     * Deletes an existing AcctRctsCash model.
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
     * Finds the AcctRctsCash model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcctRctsCash the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcctRctsCash::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionReport()
    {

        $searchModel = new AcctRctsCashSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'rctDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['cashbook'])) {
                $query->andFilterWhere(['rctCashBk' => $request['cashbook']]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'rctDate' => SORT_ASC,
            'rctNo' => SORT_ASC,
            'rctSub' => SORT_ASC
        ]);

        $cashbookItems = ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctCode')->all(), 'id', 'bactAcctCode');

        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'cashbooks' => $cashbookItems
        ]);
    }
}
