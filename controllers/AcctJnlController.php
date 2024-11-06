<?php

namespace app\controllers;

use app\models\AcctBankaccts;
use app\models\AcctJnl;
use app\models\AcctJnlSearch;
use yii\web\Controller;

use \app\models\AcctLedger;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * AcctJnlController implements the CRUD actions for AcctJnl model.
 */
class AcctJnlController extends Controller
{

    public function actionCreditCashReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        $query->andFilterWhere([
            'jnlPayRct' => 'R'
        ]);

        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'jnlDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['cashbook'])) {
                $query->andFilterWhere([
                    'jnlCashBk' => $request['cashbook']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
            'jnlSub' => SORT_ASC
        ]);

        $cashbooksQuery = (new Query())->select('jnlCashBk')->from('acct_jnl')->where(['jnlPayRct' => 'R'])->orderBy('jnlCashBk')->distinct()->all();
        $cashbookItems = [];
        foreach ($cashbooksQuery as $cashbook) {
            $cashbookItems[] = $cashbook['jnlCashBk'];
        }

        return $this->render('credit-cash-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'cashbooks' => $cashbookItems
        ]);
    }

    public function actionCreditLedgReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        $query->andFilterWhere([
            'jnlPayRct' => 'R'
        ]);

        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'jnlDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['ledger'])) {
                $query->andFilterWhere([
                    'jnlLedg' => $request['ledger']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
            'jnlSub' => SORT_ASC
        ]);

        $ledgersQuery = (new Query())->select('jnlLedg')->from('acct_jnl')->where(['jnlPayRct' => 'R'])->orderBy('jnlLedg')->distinct()->all();
        $ledgerItems = [];
        foreach ($ledgersQuery as $ledger) {
            $ledgerItems[] = $ledger['jnlLedg'];
        }

        return $this->render('credit-ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }

    public function actionDebitCashReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        $query->andFilterWhere([
            'jnlPayRct' => 'P'
        ]);

        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'jnlDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['cashbook'])) {
                $query->andFilterWhere([
                    'jnlCashBk' => $request['cashbook']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
            'jnlSub' => SORT_ASC
        ]);

        $cashbooksQuery = (new Query())->select('jnlCashBk')->from('acct_jnl')->where(['jnlPayRct' => 'P'])->orderBy('jnlCashBk')->distinct()->all();
        $cashbookItems = [];
        foreach ($cashbooksQuery as $cashbook) {
            $cashbookItems[] = $cashbook['jnlCashBk'];
        }

        return $this->render('debit-cash-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'cashbooks' => $cashbookItems
        ]);
    }

    public function actionDebitLedgReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        $query->andFilterWhere([
            'jnlPayRct' => 'P'
        ]);

        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'jnlDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['ledger'])) {
                $query->andFilterWhere([
                    'jnlLedg' => $request['ledger']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
            'jnlSub' => SORT_ASC
        ]);

        $ledgersQuery = (new Query())->select('jnlLedg')->from('acct_jnl')->where(['jnlPayRct' => 'R'])->orderBy('jnlLedg')->distinct()->all();
        $ledgerItems = [];
        foreach ($ledgersQuery as $ledger) {
            $ledgerItems[] = $ledger['jnlLedg'];
        }

        return $this->render('debit-ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }

    public function actionCreditDebitCashReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();

        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'jnlDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['cashbook'])) {
                $query->andFilterWhere([
                    'jnlCashBk' => $request['cashbook']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
            'jnlSub' => SORT_ASC
        ]);

        $cashbooksQuery = (new Query())->select('jnlCashBk')->from('acct_jnl')->orderBy('jnlCashBk')->distinct()->all();
        $cashbookItems = [];
        foreach ($cashbooksQuery as $cashbook) {
            $cashbookItems[] = $cashbook['jnlCashBk'];
        }

        return $this->render('credit-debit-cash-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'cashbooks' => $cashbookItems
        ]);
    }

    public function actionCreditDebitLedgReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();

        if (!empty($request)) {
            if (!empty($request['from']) && !empty($request['to'])) {
                if ($request['from'] <= $request['to']) {
                    $query->andFilterWhere(['between', 'jnlDate', $request['from'], $request['to']]);
                }
            }

            if (!empty($request['ledger'])) {
                $query->andFilterWhere([
                    'jnlLedg' => $request['ledger']
                ]);
            }
        } else {
            $dataProvider = null;
        }
        $query->orderBy([
            'jnlDate' => SORT_ASC,
            'jnlNo' => SORT_ASC,
            'jnlSub' => SORT_ASC
        ]);

        $ledgersQuery = (new Query())->select('jnlLedg')->from('acct_jnl')->orderBy('jnlLedg')->distinct()->all();
        $ledgerItems = [];
        foreach ($ledgersQuery as $ledger) {
            $ledgerItems[] = $ledger['jnlLedg'];
        }

        return $this->render('credit-debit-ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }
}
