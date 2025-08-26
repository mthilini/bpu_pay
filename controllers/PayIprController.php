<?php

namespace app\controllers;

use app\models\PayDept;
use app\models\PayDeptSearch;
use app\models\PayIpr;
use app\models\PayIprprv;
use app\models\PayPayhd;
use app\models\PayPayhdSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PayIprController extends Controller
{

    public function actionUniversityReconReport()
    {
        return $this->render('university-recon-report');
    }

    public function actionUniversityReconReportPdf()
    {

        $request = Yii::$app->request->get();
        $sumPr = $this->getPayIpr($request);
        $sumPrPrv = $this->getPayIprPrv($request);

        $sumArray = array_merge($sumPr, $sumPrPrv);

        return $this->renderPartial('university-recon-report-pdf', [
            'sumArray' => $sumArray,
            'request' => $request,
        ]);
    }

    public function actionPprReconReport()
    {

        $request = Yii::$app->request->get();
        return $this->render('ppr-recon-report', [
            'request' => $request,
        ]);
    }

    public function actionPprReconReportPdf()
    {

        $request = Yii::$app->request->get();
        $sumPr = $this->getPayIpr($request);
        $sumPrPrv = $this->getPayIprPrv($request);

        $sumArray = array_merge($sumPr, $sumPrPrv);

        return $this->renderPartial('ppr-recon-report-pdf', [
            'sumArray' => $sumArray,
            'request' => $request,
        ]);
    }

    public function actionIndividualDetailReconReport()
    {

        $request = Yii::$app->request->get();
        return $this->render('individual-detail-recon-report', [
            'request' => $request,
        ]);
    }

    public function actionIndividualDetailReconReportPdf()
    {

        $request = Yii::$app->request->get();
        $sumPr = $this->getPayIpr($request);
        $sumPrPrv = $this->getPayIprPrv($request);

        $sumArray = array_merge($sumPr, $sumPrPrv);

        return $this->renderPartial('individual-detail-recon-report-pdf', [
            'sumArray' => $sumArray,
            'request' => $request,
        ]);
    }

    public function getPayIpr($request)
    {
        $columns = [];
        $upfNoArr = $this->getUpfNosArr($request);
        $fields = (new \yii\db\Query())->select('COLUMN_NAME')->from('INFORMATION_SCHEMA.COLUMNS')->where(['TABLE_NAME' => PayIpr::tableName()])->distinct('COLUMN_NAME')->all();

        for ($i = 0; $i < count($fields); $i++) {
            $columns[] = $fields[$i]['COLUMN_NAME'];
        }
        $columnsCount = count($columns);
        if (($key = array_search('id', $columns)) !== false) {
            unset($columns[$key]);
        }
        if (($key = array_search('empUPFNo', $columns)) !== false) {
            unset($columns[$key]);
        }
        if (($key = array_search('iprDate', $columns)) !== false) {
            unset($columns[$key]);
        }

        $query = PayIpr::find();
        for ($i = 0; $i < $columnsCount; $i++) {
            if (isset($columns[$i])) {
                $column = $columns[$i];
                $query->addSelect("SUM($column) AS sum_$column");
            }
        }

        if (!empty($upfNoArr)) {
            $query->andFilterWhere(['in', 'empUPFNo', $upfNoArr]);
        }

        $command = $query->createCommand();
        $sumPr = $command->queryAll();

        return (!empty($sumPr) ? $sumPr[0] : []);
    }

    public function getPayIprPrv($request)
    {
        $columnsPrv = [];
        $upfNoArr = $this->getUpfNosArr($request);
        $fieldsPrv = (new \yii\db\Query())->select('COLUMN_NAME')->from('INFORMATION_SCHEMA.COLUMNS')->where(['TABLE_NAME' => PayIprprv::tableName()])->distinct('COLUMN_NAME')->all();

        for ($i = 0; $i < count($fieldsPrv); $i++) {
            $columnsPrv[] = $fieldsPrv[$i]['COLUMN_NAME'];
        }
        $columnsPrvCount = count($columnsPrv);
        if (($key = array_search('id', $columnsPrv)) !== false) {
            unset($columnsPrv[$key]);
        }
        if (($key = array_search('empUPFNo', $columnsPrv)) !== false) {
            unset($columnsPrv[$key]);
        }
        if (($key = array_search('iprpDate', $columnsPrv)) !== false) {
            unset($columnsPrv[$key]);
        }

        $query = PayIprprv::find();
        for ($i = 0; $i < $columnsPrvCount; $i++) {
            if (isset($columnsPrv[$i])) {
                $column = $columnsPrv[$i];
                $query->addSelect("SUM($column) AS sum_$column");
            }
        }

        if (!empty($upfNoArr)) {
            $query->andFilterWhere(['in', 'empUPFNo', $upfNoArr]);
        }

        $command = $query->createCommand();
        $sumPrPrv = $command->queryAll();

        return (!empty($sumPrPrv) ? $sumPrPrv[0] : []);
    }

    public function getUpfNosArr($request)
    {
        $upfNoArr = [];
        if (!empty($request)) {
            $upfNosQuery = PayPayhd::find()->select(PayPayhd::tableName() . '.empUPFNo');

            if (!empty($request['deptProg']) && !empty($request['deptProj'])) {
                $upfNosQuery->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere([PayDept::tableName() . '.deptProg' => $request['deptProg']])
                    ->andFilterWhere([PayDept::tableName() . '.deptProj' => $request['deptProj']]);
            }
            if (!empty($request['empUPFNo'])) {
                $upfNosQuery->andFilterWhere([PayPayhd::tableName() . '.empUPFNo' => $request['empUPFNo']]);
            }

            $upfNosQuery->orderBy(PayPayhd::tableName() . '.empUPFNo');

            $dataProvider = new ActiveDataProvider([
                'query' => $upfNosQuery,
                'pagination' => false,
            ]);

            $models = $dataProvider->getModels();
            foreach ($models as $key => $model) {
                $upfNoArr[] = $model->empUPFNo;
            }
        }

        return $upfNoArr;
    }
}
