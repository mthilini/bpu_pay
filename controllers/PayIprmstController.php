<?php

namespace app\controllers;

use app\models\PayDept;
use app\models\PayDeptSearch;
use app\models\PayDesig;
use app\models\PayFields;
use app\models\PayIprmst;
use app\models\PayPayhd;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PayIprmstController extends Controller
{

    // Emolument List - Individual(Annual Report)
    public function actionEmoluIndiAnnualReport()
    {

        $request = Yii::$app->request->get();
        $payFields = $this->getEmolumentField();

        return $this->render('emolu-indi-annual-report', [
            'request' => $request,
            'payFields' => $payFields
        ]);
    }
    public function actionEmoluIndiAnnualReportPdf()
    {

        $request = Yii::$app->request->get();
        $fldCode = $request['fldCode'];

        $column = 'iprmA1';
        if (str_starts_with($fldCode, '0') || str_starts_with($fldCode, '1')) {
            for ($i = 1; $i < 13; $i++) {
                $fldCodeNew = $fldCode;
                if (str_starts_with($fldCode, '0')) {
                    $fldCodeNew = ltrim($fldCode, '0');
                }

                $column = 'iprmA' . $fldCodeNew;
            }
        } else {
            if ($fldCode == '43') {
                $column = 'iprmA13';
            } else if ($fldCode == '44') {
                $column = 'iprmA14';
            }
        }

        $employeeDetail = $this->getEmployeeDetails($request['empUPFNo'], 'emolument');
        $fldName = $this->getFieldName($fldCode);
        $monthData = $this->getMonthData($column, $request['empUPFNo'], $request['year']);

        return $this->renderPartial('emolu-indi-annual-report-pdf', [
            'request' => $request,
            'employeeData' => $employeeDetail,
            'fldName' => $fldName,
            'monthData' => $monthData
        ]);
    }

    // Deduction List - Individual(Annual Report)
    public function actionDeductIndiAnnualReport()
    {

        $payFields = (new \yii\db\Query())->select(['fldCode', 'fldName'])->from(PayFields::tableName())->andFilterWhere(['<>', 'fldType', '0'])->andFilterWhere(['<>', 'fldType', '6'])
            ->orderBy([
                'fldCode' => SORT_ASC
            ])->all();

        $request = Yii::$app->request->get();
        return $this->render('deduct-indi-annual-report', [
            'request' => $request,
            'payFields' => $payFields
        ]);
    }
    public function actionDeductIndiAnnualReportPdf()
    {

        $request = Yii::$app->request->get();

        $fldCode = $request['fldCode'];
        $codeNo = (int)$fldCode;
        $columnNo = $codeNo - 12;
        $column = 'iprmD' . $columnNo;

        $employeeDetail = $this->getEmployeeDetails($request['empUPFNo'], 'deduction');
        $fldName = $this->getFieldName($fldCode);
        $monthData = $this->getMonthData($column, $request['empUPFNo'], $request['year']);

        return $this->renderPartial('deduct-indi-annual-report-pdf', [
            'request' => $request,
            'employeeData' => $employeeDetail,
            'fldName' => $fldName,
            'monthData' => $monthData
        ]);
    }

    // Individual Pay Record(Annual Report)
    public function actionPayIndiAnnualReport()
    {
        $request = Yii::$app->request->get();
        return $this->render('pay-indi-annual-report', [
            'request' => $request,
        ]);
    }
    public function actionPayIndiAnnualReportPdf()
    {

        $request = Yii::$app->request->get();
        $employeeDetail = $this->getEmployeeDetails($request['empUPFNo'], 'pay');
        $monthData = $this->getMonthData("All", $request['empUPFNo'], $request['year']);

        return $this->renderPartial('pay-indi-annual-report-pdf', [
            'request' => $request,
            'employeeData' => $employeeDetail,
            'monthData' => $monthData
        ]);
    }

    // Individual Pay Record(Annual Report)
    public function actionEmoluSummaryAnnualReport()
    {

        $request = Yii::$app->request->get();
        $payFields = $this->getEmolumentField();

        return $this->render('emolu-summary-annual-report', [
            'request' => $request,
            'payFields' => $payFields
        ]);
    }
    public function actionEmoluSummaryAnnualReportPdf()
    {

        $request = Yii::$app->request->get();
        $year = $request['year'];
        $fldCode = $request['fldCode'];
        $empAcademic = $request['empAcademic'];

        $fldName = $this->getFieldName($fldCode);
        $employees = $this->getEmployeesArray($empAcademic);

        $dates = [];
        $datesArr = $this->getDatesArray($year);
        foreach ($datesArr as $key => $date) {
            $dates[] = $date['date'];
        }

        $column = 'iprmA1';
        if (str_starts_with($fldCode, '0') || str_starts_with($fldCode, '1')) {
            for ($i = 1; $i < 13; $i++) {
                $fldCodeNew = $fldCode;
                if (str_starts_with($fldCode, '0')) {
                    $fldCodeNew = ltrim($fldCode, '0');
                }

                $column = 'iprmA' . $fldCodeNew;
            }
        } else {
            if ($fldCode == '43') {
                $column = 'iprmA13';
            } else if ($fldCode == '44') {
                $column = 'iprmA14';
            }
        }

        $monthDataArr = $this->getMonthDataForSummary($column, $year, $empAcademic);
        $employeeData = $monthData = [];
        $grandTot = 0.00;
        foreach ($monthDataArr as $key => $value) {
            $employeeData[$value['empUPFNo']][$value['date']] = $value['column'];
            $monthData[$value['date']][$value['empUPFNo']] = $value['column'];
            $grandTot += $value['column'];
        }

        foreach ($employeeData as $key => $valueArr) {
            $columnTot = 0.00;
            foreach ($valueArr as $key2 => $value) {
                $columnTot += $value;
            }
            $employeeData[$key]['total'] = $columnTot;
        }

        foreach ($monthData as $key => $valueArr) {
            $columnTot = 0.00;
            foreach ($valueArr as $key2 => $value) {
                $columnTot += $value;
            }
            $monthData[$key]['total'] = $columnTot;
        }

        return $this->renderPartial('emolu-summary-annual-report-pdf', [
            'request' => $request,
            'dates' => $dates,
            'employees' => $employees,
            'employeeData' => $employeeData,
            'monthData' => $monthData,
            'fldName' => $fldName,
            'grandTot' => $grandTot
        ]);
    }

    public function getEmployeeDetails($empUPFNo, $option)
    {

        $employeeQuery = PayPayhd::find();
        if ($option == 'emolument' || $option == "deduction") {
            $employeeQuery->select([PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empInitials', PayPayhd::tableName() . '.empSurname',]);
        } else {
            $employeeQuery->select([PayPayhd::tableName() . '.*']);
        }

        $employeeQuery->addSelect(PayDept::tableName() . '.deptName')->addSelect(PayDesig::tableName() . '.desigName')
            ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
            ->innerJoin(PayDesig::tableName(), PayDesig::tableName() . '.desigCode = ' . PayPayhd::tableName() . '.empDesig')
            ->andFilterWhere([PayPayhd::tableName() . '.empUPFNo' => $empUPFNo]);

        $command = $employeeQuery->createCommand();
        $employeeData = $command->queryAll();

        return (!empty($employeeData) ? $employeeData[0] : []);
    }

    public function getFieldName($fldCode)
    {
        $fieldNameQuery = PayFields::find()->select(['fldName'])->andFilterWhere(['fldCode' => $fldCode]);
        $command = $fieldNameQuery->createCommand();
        $employeeData = $command->queryAll();

        return ((!empty($employeeData)) ? $employeeData[0]['fldName'] : '');
    }

    public function getMonthData($column, $empUPFNo, $year)
    {
        $query = PayIprmst::find();
        if ($column == "All") {
            $query->select(["*", 'DATE_FORMAT(iprmDate, "%d %b") AS date_month']);
        } else {
            $query->select(["$column AS column", 'MONTHNAME(iprmDate) AS month']);
        }

        $query->andFilterWhere(['empUPFNo' => $empUPFNo])
            ->andFilterWhere(['YEAR(iprmDate)' => $year])
            ->orderBy([
                'MONTH(iprmDate)' => SORT_ASC
            ]);

        $command = $query->createCommand();
        $monthData = $command->queryAll();

        return (!empty($monthData) ? $monthData : []);
    }

    public function getEmolumentField()
    {
        $payFields = (new \yii\db\Query())->select(['fldCode', 'fldName'])->from(PayFields::tableName())->andFilterWhere(['fldType' => '0'])
            ->orderBy([
                'fldCode' => SORT_ASC
            ])->all();
        return $payFields;
    }

    public function getDatesArray($year)
    {
        $query = PayIprmst::find()->select(['DATE_FORMAT(iprmDate, "%m/%d/%Y") AS date', 'iprmDate'])
            ->andFilterWhere(['YEAR(iprmDate)' => $year])
            ->distinct('date')
            ->orderBy([
                'iprmDate' => SORT_ASC
            ]);

        $command = $query->createCommand();
        $dates = $command->queryAll();

        return (!empty($dates) ? $dates : []);
    }

    public function getEmployeesArray($empAcademic)
    {
        $query = PayPayhd::find()->select(['empUPFNo', 'empInitials', 'empSurname', 'empTitle'])
            ->andFilterWhere(['empAcademic' => $empAcademic])
            ->orderBy([
                'CAST(empUPFNo as signed)' => SORT_ASC
            ]);

        $command = $query->createCommand();
        $employees = $command->queryAll();

        return (!empty($employees) ? $employees : []);
    }

    public function getMonthDataForSummary($column, $year, $empAcademic)
    {
        $query = PayIprmst::find()
            ->select([PayIprmst::tableName() . ".empUPFNo", PayIprmst::tableName() . ".$column AS column", 'DATE_FORMAT(' . PayIprmst::tableName() . '.iprmDate, "%m/%d/%Y") AS date'])
            ->innerJoin(PayPayhd::tableName(), PayPayhd::tableName() . '.empUPFNo = ' . PayIprmst::tableName() . '.empUPFNo')
            ->andFilterWhere(['YEAR(' . PayIprmst::tableName() . '.iprmDate)' => $year]);

        if (!empty($empAcademic)) {
            $query->andFilterWhere([PayPayhd::tableName() . '.empAcademic' => $empAcademic]);
        }

        $query->orderBy([
            'CAST(' . PayIprmst::tableName() . '.empUPFNo as signed)' => SORT_ASC,
            'MONTH(' . PayIprmst::tableName() . '.iprmDate)' => SORT_ASC
        ]);

        $command = $query->createCommand();
        $monthData = $command->queryAll();

        return (!empty($monthData) ? $monthData : []);
    }

    // University Final Summaries
    public function actionUniFinSummaryReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('uni-fin-summary-report', [
            'request' => $request,
        ]);
    }
    public function actionUniFinSummaryReportPdf()
    {
        $request = Yii::$app->request->get();
        $summary = $this->getFinalSummary($request['month'], $request['year'], $request['empAcademic'], $request['option'], '', '');

        return $this->renderPartial('uni-fin-summary-report-pdf', [
            'request' => $request,
            'summary' => $summary
        ]);
    }

    // Programme Final Summaries
    public function actionProgFinSummaryReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('prog-fin-summary-report', [
            'request' => $request,
        ]);
    }
    public function actionProgFinSummaryReportPdf()
    {
        $request = Yii::$app->request->get();
        $summary = $this->getFinalSummary($request['month'], $request['year'], $request['empAcademic'], $request['option'], $request['deptProg'], '');

        return $this->renderPartial('prog-fin-summary-report-pdf', [
            'request' => $request,
            'summary' => $summary
        ]);
    }

    // Division Final Summaries
    public function actionDivisionSummaryReport()
    {
        $request = Yii::$app->request->get();
        $searchModel = new PayDeptSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        return $this->render('division-summary-report', [
            'request' => $request,
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionDivisionSummaryReportPdf()
    {
        $request = Yii::$app->request->get();
        $summary = $this->getFinalSummary($request['month'], $request['year'], $request['empAcademic'], $request['option'], '', $request['deptCode']);

        $deptNameQuery = PayDept::find()->select('deptName')->andFilterWhere(['deptCode' => $request['deptCode']]);
        $command = $deptNameQuery->createCommand();
        $deptNames = $command->queryAll();
        $deptName = !empty($deptNames) ? $deptNames[0]['deptName'] : '';

        return $this->renderPartial('division-summary-report-pdf', [
            'request' => $request,
            'deptName' => $deptName,
            'summary' => $summary
        ]);
    }

    // University - Journal Final Summaries
    public function actionUniJnlfinSummaryReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('uni-jnlfin-summary-report', [
            'request' => $request,
        ]);
    }
    public function actionUniJnlfinSummaryReportPdf()
    {
        $request = Yii::$app->request->get();
        $summary = $this->getCustomizedFinalSummary($request['month'], $request['year'], $request['empAcademic'], $request['option'], '', '');

        return $this->renderPartial('uni-jnlfin-summary-report-pdf', [
            'request' => $request,
            'summary' => $summary
        ]);
    }

    // Programme Final Summaries
    public function actionProgJnlfinSummaryReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('prog-jnlfin-summary-report', [
            'request' => $request,
        ]);
    }
    public function actionProgJnlfinSummaryReportPdf()
    {
        $request = Yii::$app->request->get();
        $summary = $this->getCustomizedFinalSummary($request['month'], $request['year'], $request['empAcademic'], $request['option'], $request['deptProg'], '');

        return $this->renderPartial('prog-jnlfin-summary-report-pdf', [
            'request' => $request,
            'summary' => $summary
        ]);
    }

    public function getFinalSummary($month, $year, $empAcademic, $option, $deptProg = '', $deptCode = '')
    {
        $columns = [];
        $fields = (new \yii\db\Query())->select('COLUMN_NAME')->from('INFORMATION_SCHEMA.COLUMNS')->where(['TABLE_NAME' => PayIprmst::tableName()])->distinct('COLUMN_NAME')->all();

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
        if (($key = array_search('iprmDate', $columns)) !== false) {
            unset($columns[$key]);
        }

        $query = PayIprmst::find();
        if (!empty($deptCode)) {
            $query->select([PayIprmst::tableName() . '.empUPFNo']);
        } else {
            if (!empty($deptProg)) {
                $query->select([PayDept::tableName() . '.deptProj']);
            } else {
                $query->select([PayDept::tableName() . '.deptProg']);
            }
        }

        for ($i = 0; $i < $columnsCount; $i++) {
            if (isset($columns[$i])) {
                $column = $columns[$i];
                $query->addSelect("SUM(" . PayIprmst::tableName() . ".$column) AS sum_$column");
            }
        }

        $query->innerJoin(PayPayhd::tableName(), PayPayhd::tableName() . '.empUPFNo = ' . PayIprmst::tableName() . '.empUPFNo')
            ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
            ->andFilterWhere(['YEAR(' . PayIprmst::tableName() . '.iprmDate)' => $year]);

        if (!empty($empAcademic)) {
            $query->andFilterWhere([PayPayhd::tableName() . '.empAcademic' => $empAcademic]);
        }
        if (!empty($deptProg)) {
            $query->andFilterWhere([PayDept::tableName() . '.deptProg' => $deptProg]);
        }
        if (!empty($deptCode)) {
            $query->andFilterWhere([PayDept::tableName() . '.deptCode' => $deptCode]);
        }

        if ($option == 'monthly') {
            $query->andFilterWhere(['MONTH(' . PayIprmst::tableName() . '.iprmDate)' => $month]);
        } else {
            $query->andFilterWhere(['<=', 'MONTH(' . PayIprmst::tableName() . '.iprmDate)', $month]);
        }

        if (!empty($deptCode)) {
            $query->groupBy(PayIprmst::tableName() . '.empUPFNo')
                ->orderBy([
                    'CAST(' . PayIprmst::tableName() . '.empUPFNo AS signed)' => SORT_ASC
                ]);
        } else {
            if (!empty($deptProg)) {
                $query->groupBy(PayDept::tableName() . '.deptProj')
                    ->orderBy([
                        'CAST(' . PayDept::tableName() . '.deptProj AS signed)' => SORT_ASC
                    ]);
            } else {
                $query->groupBy(PayDept::tableName() . '.deptProg')
                    ->orderBy([
                        'CAST(' . PayDept::tableName() . '.deptProg AS signed)' => SORT_ASC
                    ]);
            }
        }

        $command = $query->createCommand();
        $summary = $command->queryAll();

        return (!empty($summary) ? $summary : []);
    }

    public function getCustomizedFinalSummary($month, $year, $empAcademic, $option, $deptProg = '', $deptCode = '')
    {
        $summary = $this->getFinalSummary($month, $year, $empAcademic, $option, $deptProg, $deptCode);

        $finSummary = [];
        if (!empty($summary)) {
            foreach ($summary as $key => $sm) {
                $iprmA1 = $sm['sum_iprmA1'];
                $iprmA2 = $sm['sum_iprmA2'];
                $iprmA3 = $sm['sum_iprmA3'];
                $iprmA11 = $sm['sum_iprmA11'];
                $iprmNopay = $sm['sum_iprmNopay'];
                $iprmOPay = $sm['sum_iprmOPay'];
                $salAdvnce = $sm['sum_iprmD5'];
                $splDed = $sm['sum_iprmD19'];
                $iprmD20 = $sm['sum_iprmD20'];
                $iprmD30 = $sm['sum_iprmD30'];
                $iprmD2 = $sm['sum_iprmD2'];
                $iprmD6 = $sm['sum_iprmD6'];
                $iprmD7 = $sm['sum_iprmD7'];
                $iprmD27 = $sm['sum_iprmD27'];
                $iprmD10 = $sm['sum_iprmD10'];
                $iprmD11 = $sm['sum_iprmD11'];
                $iprmD12 = $sm['sum_iprmD12'];
                $iprmD4 = $sm['sum_iprmD4'];
                $iprmD23 = $sm['sum_iprmD23'];
                $iprmD29 = $sm['sum_iprmD29'];
                $iprmD3 = $sm['sum_iprmD3'];
                $iprmA4 = $sm['sum_iprmA4'];
                $iprmA7 = $sm['sum_iprmA7'];
                $iprmA8 = $sm['sum_iprmA8'];
                $iprmA13 = $sm['sum_iprmA13'];
                $iprmA14 = $sm['sum_iprmA14'];

                $overPay = $iprmD20 + $iprmD30;
                $salW = $iprmD2 + $iprmD6 + $iprmD7 + $iprmD27 + $iprmD10 + $iprmD11 + $iprmD12 + $iprmD4 + $iprmD23 + $iprmD29 + $iprmD3;
                $r1 = ($iprmA1 + $iprmA2 + $iprmA3 + $iprmA11) - ($iprmNopay + $iprmOPay + $salW + $overPay + $salAdvnce + $splDed);

                $r2 = $sm['sum_iprmUPF15'];
                $r3 = $sm['sum_iprmETF3'];
                $r4 = $sm['sum_iprmA10'];
                $r5 = $iprmA4 + $iprmA7 + $iprmA8;
                $r6 = $sm['sum_iprmA12'];
                $r7 = $sm['sum_iprmA5'];
                $r8 = $sm['sum_iprmA6'];
                $r9 = $sm['sum_iprmA9'];
                $r10 = $iprmA13 + $iprmA14;
                $rsub = $r1 + $r2 + $r3 + $r4 + $r5 + $r6 + $r7 + $r8 + $r9 + $r10;

                $iprmD2 = $sm['sum_iprmD2'];
                $iprmD6 = $sm['sum_iprmD6'];
                $iprmD7 = $sm['sum_iprmD7'];
                $iprmD27 = $sm['sum_iprmD27'];
                $iprmD10 = $sm['sum_iprmD10'];
                $iprmD11 = $sm['sum_iprmD11'];
                $iprmD12 = $sm['sum_iprmD12'];
                $iprmD4 = $sm['sum_iprmD4'];
                $iprmD23 = $sm['sum_iprmD23'];
                $iprmD29 = $sm['sum_iprmD29'];
                $iprmD3 = $sm['sum_iprmD3'];
                $iprmD20 = $sm['sum_iprmD20'];
                $iprmD30 = $sm['sum_iprmD30'];

                $r11 = $iprmD2 + $iprmD6 + $iprmD7 + $iprmD27 + $iprmD10 + $iprmD11 + $iprmD12 + $iprmD4 + $iprmD23 + $iprmD29 + $iprmD3;
                $r12 = $sm['sum_iprmUP8'];
                $r13 = $iprmD20 + $iprmD30;
                $r14 = $sm['sum_iprmD5'];
                $r15 = $sm['sum_iprmD19'];

                $rgrand = $rsub + $r11 + $r12 + $r13 + $r14 + $r15;

                $column = [
                    'r1' => $r1,
                    'r2' => $r2,
                    'r3' => $r3,
                    'r4' => $r4,
                    'r5' => $r5,
                    'r6' => $r6,
                    'r7' => $r7,
                    'r8' => $r8,
                    'r9' => $r9,
                    'r10' => $r10,
                    'rsub' => $rsub,
                    'r11' => $r11,
                    'r12' => $r12,
                    'r13' => $r13,
                    'r14' => $r14,
                    'r15' => $r15,
                    'rgrand' => $rgrand
                ];

                if (!empty($deptProg)) {
                    $column['deptProj'] = $sm['deptProj'];
                } else {
                    $column['deptProg'] = $sm['deptProg'];
                }

                $finSummary[] = $column;
            }
        }

        return $finSummary;
    }

    // Pay Advice Monthly Report
    public function actionPayAdviceReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('pay-advice-report', [
            'request' => $request,
        ]);
    }
    public function actionPayAdviceReportPdf()
    {
        $request = Yii::$app->request->get();
        $query = PayIprmst::find()
            ->select([PayIprmst::tableName() . '.*', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PayDesig::tableName() . '.desigName'])
            ->innerJoin(PayPayhd::tableName(), PayPayhd::tableName() . '.empUPFNo = ' . PayIprmst::tableName() . '.empUPFNo')
            ->innerJoin(PayDesig::tableName(), PayDesig::tableName() . '.desigCode = ' . PayPayhd::tableName() . '.empDesig')
            ->andFilterWhere(['YEAR(' . PayIprmst::tableName() . '.iprmDate)' => $request['year']])
            ->andFilterWhere(['MONTH(' . PayIprmst::tableName() . '.iprmDate)' => $request['month']])
            ->orderBy([
                'CAST(' . PayIprmst::tableName() . '.empUPFNo AS signed)' => SORT_ASC
            ]);

        $command = $query->createCommand();
        $summary = $command->queryAll();

        return $this->renderPartial('pay-advice-report-pdf', [
            'request' => $request,
            'empSummary' => $summary
        ]);
    }
}
