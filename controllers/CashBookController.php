<?php

namespace app\controllers;

use app\models\AcctPaycash;
use app\models\AcctPayledg;
use app\models\AcctLedger;
use app\models\AcctLedgmain;
use yii\helpers\ArrayHelper;
use app\models\AcctPaycashSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class CashBookController extends Controller
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
                        'ledgers' => ['post'],
                    ],
                ],
            ]
        );
    }

    /**
     * Creates a new payment.
     * @return string|\yii\web\Response
     */
    public function actionPayment()
    {
        $model_cash = new AcctPaycash();
        $model_ledger = new AcctPayledg();

        return $this->render('payment', [
            'model_cash' => $model_cash,
            'model_ledger' => $model_ledger,
        ]);
    }

    /**
     * Creates a new receipt.
     * @return string|\yii\web\Response
     */
    public function actionReceipt()
    {
        $model_cash = new AcctPaycash();
        $model_ledger = new AcctPayledg();

        return $this->render('receipt', [
            'model_cash' => $model_cash,
            'model_ledger' => $model_ledger,
        ]);
    }

    /**
     * Creates a new jopuranl.
     * @return string|\yii\web\Response
     */
    public function actionJournal()
    {
        $model_cash = new AcctPaycash();
        $model_ledger = new AcctPayledg();

        return $this->render('journal', [
            'model_cash' => $model_cash,
            'model_ledger' => $model_ledger,
        ]);
    }

    /* send ledgers */
    public function actionLedgers()
    {
        $receive = file_get_contents('php://input');
        $response['model'] = json_decode($receive);

        if ($response['model']->main_ledger != '') {
            $query = AcctLedger::find()->where(['mainCode' => $response['model']->main_ledger]);
        } else {
            $query = AcctLedger::find()->where([]);
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                    'pageSize' => 0,
                ],
            'sort' => [
                'defaultOrder' => [
                    'ledgDesc' => SORT_ASC,
                ]
            ],
        ]);

        // returns an array of Post objects
        $ledgers = $provider->getModels();

        if ($ledgers != null) {
            $response['status'] = "OK";
            $response['data'] = ArrayHelper::map($ledgers, 'ledgCode', 'ledgDesc');
        } else {
            $response['status'] = "error : unable to validate";
        }

        //header('Content-Type: application/json; charset=utf-8');
        return json_encode($response);
        //return;
    }

    public function actionMainledger()
    {
        $receive = file_get_contents('php://input');
        $response['model'] = json_decode($receive);

        $maincode = AcctLedger::find()->select('mainCode')->where(['ledgCode' => $response['model']->ledger])->one();
        $query = AcctLedgmain::find()->where(['mainCode' => $maincode]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                    'pageSize' => 0,
                ],
            'sort' => [
                'defaultOrder' => [
                    'mainDesc' => SORT_ASC,
                ]
            ],
        ]);

        // returns an array of Post objects
        $ledger = $provider->getModels();

        if ($ledger != null) {
            $response['status'] = "OK";
            $response['data'] = ArrayHelper::map($ledger, 'mainCode', 'mainDesc');
        } else {
            $response['status'] = "error : unable to validate";
        }

        //header('Content-Type: application/json; charset=utf-8');
        return json_encode($response);
        //return;
    }

    /**
     * Deletes an existing AcctPaycash model.
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
     * Finds the AcctPaycash model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcctPaycash the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcctPaycash::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
