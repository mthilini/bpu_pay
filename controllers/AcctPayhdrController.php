<?php
namespace app\controllers;
use Yii;
//
use app\models\AcctPayhdr;
use app\models\AcctPayhdrSearch;
//
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
//
use app\models\AcctPaycash;
use app\models\AcctPayledg;
use app\models\AcctPaycashSearch;
use app\models\AcctPayledgSearch;
//
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * AcctPayhdrController implements the CRUD actions for AcctPayhdr model.
 */
class AcctPayhdrController extends Controller
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
     * Lists all AcctPayhdr models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AcctPayhdrSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcctPayhdr model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $payCashes = $this->getPayCash($model->id);
        $payLedgers = $this->getPayLedg($model->id);
        return $this->render('view', [
            'model' => $model,
            'payCashes' => $payCashes,
            'payLedgers'=>$payLedgers,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AcctPayhdr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcctPayhdr();
        $modelsCash = [new AcctPaycash];
        $modelsLedger = [new AcctPayledg];
        //
        if ($model->load(\Yii::$app->request->post())) {
            //
            $modelsCash = Model::createMultiple(AcctPaycash::classname());
            Model::loadMultiple($modelsCash, Yii::$app->request->post());
            //
            $modelsLedger = Model::createMultiple(AcctPayledg::classname());
            Model::loadMultiple($modelsLedger, Yii::$app->request->post());
            //
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsCash) && $valid;
            $valid = Model::validateMultiple($modelsLedger) && $valid;
            //
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsCash as $modelCash) {
                            $modelCash->payVch = $model->payVch;
                            $modelCash->payCashBk = $model->payCashBk;
                            if (! ($flag = $modelCash->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        //
                        foreach ($modelsLedger as $modelLedger) {
                            $modelLedger->payVch = $model->payVch;
                            $modelLedger->payCashBk = $model->payCashBk;
                            if (! ($flag = $modelLedger->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'modelsCash' => (empty($modelsCash)) ? [new AcctPaycash] : $modelsCash,
            'modelsLedger' => (empty($modelsLedger)) ? [new AcctPayledg] : $modelsLedger
        ]);
    }

    /**
     * Updates an existing AcctPayhdr model.
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
     * Deletes an existing AcctPayhdr model.
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
     * Finds the AcctPayhdr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcctPayhdr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcctPayhdr::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //
    //
    public function getPayCash($id)
    {
        $model = AcctPaycash::find()->where(['payVch' => $id])->all();
        return $model;
    }
    //
    public function getPayLedg($id)
    {
        $model = AcctPayledg::find()->where(['payVch' => $id])->all();
        return $model;
    }
}
