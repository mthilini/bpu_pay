<?php

namespace app\controllers;

use app\models\AcctJnl;
use app\models\AcctJnlSearch;
use app\models\AcctLedger;
use app\models\AcctVotes;
use app\models\AcctZledg;
use yii\web\Controller;

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
        // echo $query->createCommand()->getRawSql();exit;
        $cashbooksQuery = AcctJnl::find()->select('jnlCashBk')->where(['jnlPayRct' => 'R'])->orderBy('jnlCashBk')->distinct()->all();
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

        $cashbooksQuery = AcctJnl::find()->select('jnlCashBk')->where(['jnlPayRct' => 'P'])->orderBy('jnlCashBk')->distinct()->all();
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

        $cashbooksQuery = AcctJnl::find()->select('jnlCashBk')->orderBy('jnlCashBk')->distinct()->all();
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

    public function actionCreditLedgReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->lsearch([])->query;

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

        $ledgerItems = ArrayHelper::map(AcctLedger::find()->orderBy('ledgCode')->all(), 'id', 'ledgCode');
        // echo $query->createCommand()->getRawSql();exit;
        return $this->render('credit-ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }

    public function actionDebitLedgReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->lsearch([])->query;

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

        $ledgerItems = ArrayHelper::map(AcctLedger::find()->orderBy('ledgCode')->all(), 'id', 'ledgCode');

        return $this->render('debit-ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }

    public function actionCreditDebitLedgReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->lsearch([])->query;

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

        $ledgerItems = ArrayHelper::map(AcctLedger::find()->orderBy('ledgCode')->all(), 'id', 'ledgCode');

        return $this->render('credit-debit-ledg-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'ledgers' => $ledgerItems
        ]);
    }

    public function actionCreditVoteReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->vsearch([])->query;

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

            if (!empty($request['vote'])) {
                $query->andFilterWhere([
                    'jnlLedg' => $request['vote']
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

        $voteItems = ArrayHelper::map(AcctVotes::find()->orderBy('voteVote')->all(), 'id', 'voteVote');

        return $this->render('credit-vote-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'votes' => $voteItems,
        ]);
    }

    public function actionDebitVoteReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->vsearch([])->query;

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

            if (!empty($request['vote'])) {
                $query->andFilterWhere([
                    'jnlLedg' => $request['vote']
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

        $voteItems = ArrayHelper::map(AcctVotes::find()->orderBy('voteVote')->all(), 'id', 'voteVote');

        return $this->render('debit-vote-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'votes' => $voteItems,
        ]);
    }

    public function actionCreditDebitVoteReport()
    {

        $searchModel = new AcctJnlSearch();
        $query = $searchModel->vsearch([])->query;

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

            if (!empty($request['vote'])) {
                $query->andFilterWhere([
                    'jnlLedg' => $request['vote']
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

        $voteItems = ArrayHelper::map(AcctVotes::find()->orderBy('voteVote')->all(), 'id', 'voteVote');

        return $this->render('credit-debit-vote-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'votes' => $voteItems,
        ]);
    }
}
