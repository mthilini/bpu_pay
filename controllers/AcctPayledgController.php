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
        if (isset($request['a_min']) && $request['a_min'] != '' && isset($request['a_max']) && $request['a_max'] != '') {
            if (is_numeric($request['a_min']) && is_numeric($request['a_max']))
                $query->andFilterWhere(['between', 'id', $request['a_min'], $request['a_max']]);
        } else
            $dataProvider = null;


        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
        ]);
    }
}
