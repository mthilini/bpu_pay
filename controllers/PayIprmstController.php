<?php

namespace app\controllers;

use app\models\PayDept;
use app\models\PayDesig;
use app\models\PayFields;
use app\models\PayIprmst;
use app\models\PayPayhd;
use Yii;
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
        $summary = $this->getFinalSummary($request['month'], $request['year'], $request['empAcademic'], $request['option']);

        return $this->renderPartial('uni-fin-summary-report-pdf', [
            'request' => $request,
            'summary' => $summary
        ]);
    }

    public function getFinalSummary($month, $year, $empAcademic, $option)
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

        $query = PayIprmst::find()->select([PayDept::tableName() . '.deptProg']);
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

        if ($option == 'monthly') {
            $query->andFilterWhere(['MONTH(' . PayIprmst::tableName() . '.iprmDate)' => $month]);
        } else {
            $query->andFilterWhere(['<=', 'MONTH(' . PayIprmst::tableName() . '.iprmDate)', $month]);
        }

        $query->groupBy(PayDept::tableName() . '.deptProg')
            ->orderBy([
                'CAST(' . PayDept::tableName() . '.deptProg AS signed)' => SORT_ASC
            ]);

        $command = $query->createCommand();
        $summary = $command->queryAll();
        
        return (!empty($summary) ? $summary : []);
    }
}
