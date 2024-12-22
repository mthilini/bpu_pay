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

        $payFields = (new \yii\db\Query())->select(['fldCode', 'fldName'])->from(PayFields::tableName())->andFilterWhere(['fldType' => '0'])->orderBy('fldCode')->all();

        $request = Yii::$app->request->get();
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

        $payFields = (new \yii\db\Query())->select(['fldCode', 'fldName'])->from(PayFields::tableName())->andFilterWhere(['<>', 'fldType', '0'])->andFilterWhere(['<>', 'fldType', '6'])->orderBy('fldCode')->all();

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
            ->orderBy('MONTH(iprmDate)');

        $command = $query->createCommand();
        $monthData = $command->queryAll();
        
        return (!empty($monthData) ? $monthData : []);
    }
}
