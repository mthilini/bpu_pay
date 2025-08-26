<?php

namespace app\controllers;

use app\models\PayA13type;
use app\models\PayA14type;
use app\models\PayA5type;
use app\models\PayBank;
use app\models\PayDept;
use app\models\PayDesig;
use app\models\PayFields;
use app\models\PayIprmst;
use app\models\PayPayetot;
use app\models\PayPayhd;
use app\models\PayPayhdSearch;
use app\models\PaySa13;
use app\models\PaySa14;
use app\models\PaySa5;
use app\models\PaySbnk;
use app\models\PaySded;
use app\models\PaySeml;
use app\models\PayStax;
use app\models\PayTaxtype;
use mPDF;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;

/**
 * PayPayhdController implements the CRUD actions for PaySeml model.
 */
class PayPayhdController extends Controller
{

    public function actionEmolunmentReport()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PaySeml::tableName() . '.semlStart', PaySeml::tableName() . '.semlEnd', PaySeml::tableName() . '.semlAmt', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PaySeml::tableName(), PaySeml::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PaySeml::tableName() . '.semlStart', $request['date']])
                    ->andFilterWhere(['>=', PaySeml::tableName() . '.semlEnd', $request['date']]);
                if (!empty($request['fldCode'])) {
                    $query->andFilterWhere([PaySeml::tableName() . '.semlFld' => $request['fldCode']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['fldCode', 'fldName'])->from(PayFields::tableName())->where(['fldType' => '0'])->orderBy('fldCode')->all();

        return $this->render('emolunment-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionDeductionReport()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PaySded::tableName() . '.sdedStart', PaySded::tableName() . '.sdedEnd', PaySded::tableName() . '.sdedAmt', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PaySded::tableName(), PaySded::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PaySded::tableName() . '.sdedStart', $request['date']])
                    ->andFilterWhere(['>=', PaySded::tableName() . '.sdedEnd', $request['date']]);

                if (!empty($request['fldCode'])) {
                    $query->andFilterWhere([PaySded::tableName() . '.sdedFld' => $request['fldCode']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['fldCode', 'fldName'])->from(PayFields::tableName())->where(['fldType' => '1'])->orderBy('fldCode')->all();

        return $this->render('deduction-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionSa5Report()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PaySa5::tableName() . '.sa5Start', PaySa5::tableName() . '.sa5End', PaySa5::tableName() . '.sa5Amt', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PaySa5::tableName(), PaySa5::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PaySa5::tableName() . '.sa5Start', $request['date']])
                    ->andFilterWhere(['>=', PaySa5::tableName() . '.sa5End', $request['date']]);
                if (!empty($request['a5Code'])) {
                    $query->andFilterWhere([PaySa5::tableName() . '.sa5Fld' => $request['a5Code']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['a5Code', 'a5Desc'])->from(PayA5type::tableName())->orderBy('a5Code')->all();

        return $this->render('sa5-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionSa13Report()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PaySa13::tableName() . '.sa13Start', PaySa13::tableName() . '.sa13End', PaySa13::tableName() . '.sa13Amt', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PaySa13::tableName(), PaySa13::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PaySa13::tableName() . '.sa13Start', $request['date']])
                    ->andFilterWhere(['>=', PaySa13::tableName() . '.sa13End', $request['date']]);
                if (!empty($request['date']) && !empty($request['a13Code'])) {
                    $query->andFilterWhere([PaySa13::tableName() . '.sa13Fld' => $request['a13Code']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['a13Code', 'a13Desc'])->from(PayA13type::tableName())->orderBy('a13Code')->all();

        return $this->render('sa13-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionSa14Report()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PaySa14::tableName() . '.sa14Start', PaySa14::tableName() . '.sa14End', PaySa14::tableName() . '.sa14Amt', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PaySa14::tableName(), PaySa14::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PaySa14::tableName() . '.sa14Start', $request['date']])
                    ->andFilterWhere(['>=', PaySa14::tableName() . '.sa14End', $request['date']]);
                if (!empty($request['a14Code'])) {
                    $query->andFilterWhere([PaySa14::tableName() . '.sa14Fld' => $request['a14Code']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['a14Code', 'a14Desc'])->from(PayA14type::tableName())->orderBy('a14Code')->all();

        return $this->render('sa14-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionTaxDeductionReport()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PayStax::tableName() . '.staxStart', PayStax::tableName() . '.staxEnd', PayStax::tableName() . '.staxAmt', PayStax::tableName() . '.staxIncome', PayStax::tableName() . '.staxMoney', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PayStax::tableName(), PayStax::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PayStax::tableName() . '.staxStart', $request['date']])
                    ->andFilterWhere(['>=', PayStax::tableName() . '.staxEnd', $request['date']]);
                if (!empty($request['taxCode'])) {
                    $query->andFilterWhere([PayStax::tableName() . '.staxFld' => $request['taxCode']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['taxCode', 'taxDesc'])->from(PayTaxtype::tableName())->orderBy('taxCode')->all();

        return $this->render('tax-deduction-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionSbnkReport()
    {

        $searchModel = new PayPayhdSearch();
        $dataProvider = null;

        $request = Yii::$app->request->get();
        if (!empty($request)) {
            if (!empty($request['date'])) {
                $query = new Query();
                $query->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PaySbnk::tableName() . '.sbnkStart', PaySbnk::tableName() . '.sbnkEnd', PaySbnk::tableName() . '.sbnkAmt', PaySbnk::tableName() . '.sbnkAcct', PaySbnk::tableName() . '.sbnkAName', PaySbnk::tableName() . '.sbnkLoan', PayDept::tableName() . '.deptName'])
                    ->from(PayPayhd::tableName())
                    ->innerJoin(PaySbnk::tableName(), PaySbnk::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
                    ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
                    ->andFilterWhere(['<=', PaySbnk::tableName() . '.sbnkStart', $request['date']])
                    ->andFilterWhere(['>=', PaySbnk::tableName() . '.sbnkEnd', $request['date']]);

                if (!empty($request['bankBank'])) {
                    $query->andFilterWhere([PaySbnk::tableName() . '.sbnkBank' => $request['bankBank']]);
                }

                $query->orderBy([
                    'empUPFNo' => SORT_ASC,
                    'empSurname' => SORT_ASC
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => false,
                ]);
            }
        }

        $payFields = (new \yii\db\Query())->select(['bankBank', 'bankName'])->from(PayBank::tableName())->orderBy('bankBank')->all();

        return $this->render('sbnk-report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'request' => $request,
            'payFields' => $payFields
        ]);
    }

    public function actionEmployeeDetailReport()
    {
        $upfListQuery = PayPayhd::find()->select('empUPFNo')->orderBy('CAST(empUPFNo AS signed)');
        $upfListProvider = new ActiveDataProvider([
            'query' => $upfListQuery,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        return $this->render('employee-detail-report', [
            'request' => $request,
            'upfList' => $upfListProvider
        ]);
    }

    public function actionEmployeeDetailPdf()
    {
        $searchModel = new PayPayhdSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request) && !empty($request['upfNo'])) {
            $query->andFilterWhere([
                'empUPFNo' => $request['upfNo']
            ]);
        } else {
            $dataProvider = null;
        }

        return $this->renderPartial('employee-detail-pdf', [
            'dataProvider' => $dataProvider,
            'request' => $request
        ]);
    }

    public function actionEmployeeRemarkReport()
    {
        $upfListQuery = PayPayhd::find()->select('empUPFNo')->orderBy('CAST(empUPFNo AS signed)');
        $upfListProvider = new ActiveDataProvider([
            'query' => $upfListQuery,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        return $this->render('employee-remark-report', [
            'request' => $request,
            'upfList' => $upfListProvider
        ]);
    }

    public function actionEmployeeRemarkPdf()
    {
        $searchModel = new PayPayhdSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        if (!empty($request) && !empty($request['upfNo'])) {
            $query->andFilterWhere([
                'empUPFNo' => $request['upfNo']
            ]);
        } else {
            $dataProvider = null;
        }

        return $this->renderPartial('employee-remark-pdf', [
            'dataProvider' => $dataProvider,
            'request' => $request
        ]);
    }

    // Employee (Dept. Wise) - Employee List
    public function actionEmpEmployeeReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('emp-dept-report', [
            'request' => $request,
            'title' => 'Employee (Dept. Wise) - Employee List',
            'searchOption' => 'emp-employee-report',
            'reportOption' => 'emp-employee-report-pdf?'
        ]);
    }
    public function actionEmpEmployeeReportPdf()
    {

        $request = Yii::$app->request->get();
        $employeeData = $this->getEmployeeDetailsDeptWise($request['year'], $request['month']);

        $employees = [];
        foreach ($employeeData as $key => $emp) {
            $employees[$emp['deptCode']]['deptName'] = $emp['deptName'];
            $employees[$emp['deptCode']]['employees'][] = $emp;
        }

        return $this->renderPartial('emp-employee-report-pdf', [
            'request' => $request,
            'employeeData' => $employees
        ]);
    }

    // Employee (Dept. Wise) - Without Gross Pay
    public function actionEmpWithoutgrossReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('emp-dept-report', [
            'request' => $request,
            'title' => 'Employee (Dept. Wise) - Without Gross Pay',
            'searchOption' => 'emp-withoutgross-report',
            'reportOption' => 'emp-withoutgross-report-pdf?'
        ]);
    }
    public function actionEmpWithoutgrossReportPdf()
    {

        $request = Yii::$app->request->get();
        $employeeData = $this->getEmployeeDetailsDeptWise($request['year'], $request['month']);

        $employees = [];
        foreach ($employeeData as $key => $emp) {
            $employees[$emp['deptCode']]['deptName'] = $emp['deptName'];
            $employees[$emp['deptCode']]['employees'][] = $emp;
        }

        return $this->renderPartial('emp-withoutgross-report-pdf', [
            'request' => $request,
            'employeeData' => $employees
        ]);
    }

    // Employee (Dept. Wise) - With Gross Pay
    public function actionEmpWithgrossReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('emp-dept-report', [
            'request' => $request,
            'title' => 'Employee (Dept. Wise) - With Gross Pay',
            'searchOption' => 'emp-withgross-report',
            'reportOption' => 'emp-withgross-report-pdf?'
        ]);
    }
    public function actionEmpWithgrossReportPdf()
    {

        $request = Yii::$app->request->get();
        $employeeData = $this->getEmployeeDetailsDeptWise($request['year'], $request['month'], true);

        $employees = [];
        foreach ($employeeData as $key => $emp) {
            $employees[$emp['deptCode']]['deptName'] = $emp['deptName'];
            $employees[$emp['deptCode']]['employees'][] = $emp;
        }

        return $this->renderPartial('emp-withgross-report-pdf', [
            'request' => $request,
            'employeeData' => $employees
        ]);
    }

    public function getEmployeeDetailsDeptWise($year, $month, $gross = false)
    {
        $query = PayIprmst::find()->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PayDept::tableName() . '.deptCode', PayDept::tableName() . '.deptName', PayDesig::tableName() . '.desigName'])
            ->innerJoin(PayPayhd::tableName(), PayPayhd::tableName() . '.empUPFNo = ' . PayIprmst::tableName() . '.empUPFNo')
            ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept')
            ->innerJoin(PayDesig::tableName(), PayDesig::tableName() . '.desigCode = ' . PayPayhd::tableName() . '.empDesig');

        if ($gross == true) {
            $query->addSelect(PayIprmst::tableName() . '.iprmGross');
        }

        $query->andFilterWhere(['YEAR(' . PayIprmst::tableName() . '.iprmDate)' => $year])
            ->andFilterWhere(['MONTH(' . PayIprmst::tableName() . '.iprmDate)' => $month])
            ->orderBy([
                PayDept::tableName() . '.deptProg' => SORT_ASC,
                PayDept::tableName() . '.deptProj' => SORT_ASC,
                'CAST(' . PayIprmst::tableName() . '.empUPFNo as signed)' => SORT_ASC
            ]);

        $command = $query->createCommand();
        $employeeData = $command->queryAll();

        return $employeeData;
    }

    // Employee Details
    public function actionEmpDetailReport()
    {
        $request = Yii::$app->request->get();

        return $this->render('emp-detail-report', [
            'request' => $request,
        ]);
    }
    public function actionEmpDetailReportPdf()
    {

        $request = Yii::$app->request->get();

        $desigName = $request['chkdesigName'];
        $empDtBirth = $request['chkempDtBirth'];
        $empDtAppt = $request['chkempDtAppt'];
        $empBasic = $request['chkempBasic'];
        $deptName = $request['chkdeptName'];
        $empDtRetir = $request['chkempDtRetir'];

        $query = PayPayhd::find()->select([PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials']);
        if ($desigName == '1') {
            $query->addSelect(PayDesig::tableName() . '.desigName')
                ->innerJoin(PayDesig::tableName(), PayDesig::tableName() . '.desigCode = ' . PayPayhd::tableName() . '.empDesig');
        }
        if ($empDtBirth == '1') {
            $query->addSelect(PayPayhd::tableName() . '.empDtBirth');
        }
        if ($empDtAppt == '1') {
            $query->addSelect(PayPayhd::tableName() . '.empDtAppt');
        }
        if ($empBasic == '1') {
            $query->addSelect(PayPayhd::tableName() . '.empBasic');
        }
        if ($deptName == '1') {
            $query->addSelect(PayDept::tableName() . '.deptName')
                ->innerJoin(PayDept::tableName(), PayDept::tableName() . '.deptCode = ' . PayPayhd::tableName() . '.empDept');
        }
        if ($empDtBirth == '1') {
            $query->addSelect(PayPayhd::tableName() . '.empDtBirth');
        }
        if ($empDtRetir == '1') {
            $query->addSelect(PayPayhd::tableName() . '.empDtTemp');
        }
        $query->orderBy([
            'CAST(' . PayPayhd::tableName() . '.empUPFNo as signed)' => SORT_ASC
        ]);

        $command = $query->createCommand();
        $employeeData = $command->queryAll();

        return $this->renderPartial('emp-detail-report-pdf', [
            'request' => $request,
            'employees' => $employeeData
        ]);
    }

    // Basic Salary - Report
    public function actionBasicSalaryReport()
    {
        $request = Yii::$app->request->get();
        $option = 'All';
        if (!empty($request['empAcademic'])) {
            $option = ($request['empAcademic'] == 'A') ? 'Academic' :  'Non Academic';
        }

        $title = 'Basic Salary - ' . $option;

        return $this->render('basic-salary-report', [
            'request' => $request,
            'title' => $title
        ]);
    }
    public function actionBasicSalaryReportPdf()
    {
        $request = Yii::$app->request->get();
        $query = PayPayhd::find()
            ->select([PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empInitials', PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empAcctNo', PayPayhd::tableName() . '.empAcctName', PayBank::tableName() . '.bankName', PayPayhd::tableName() . '.empBasic'])
            ->innerJoin(PayBank::tableName(), PayPayhd::tableName() . '.empBankCode = ' . PayBank::tableName() . '.bankBank')
            ->orderBy([
                'CAST(' . PayPayhd::tableName() . '.empUPFNo AS signed)' => SORT_ASC
            ]);

        $option = 'All';
        if (!empty($request['empAcademic'])) {
            $query->andFilterWhere([PayPayhd::tableName() . '.empAcademic' => $request['empAcademic']]);
            $option = ($request['empAcademic'] == 'A') ? 'Academic' :  'Non Academic';
        }
        $command = $query->createCommand();
        $summary = $command->queryAll();

        return $this->renderPartial('basic-salary-report-pdf', [
            'request' => $request,
            'summary' => $summary,
            'option' => $option
        ]);
    }

    public function actionT10FormatReport()
    {
        $upfListQuery = PayPayhd::find()->select('empUPFNo')->orderBy('CAST(empUPFNo AS signed)');
        $upfListProvider = new ActiveDataProvider([
            'query' => $upfListQuery,
            'pagination' => false,
        ]);

        $request = Yii::$app->request->get();
        return $this->render('t10-format-report', [
            'request' => $request,
            'upfList' => $upfListProvider
        ]);
    }

    public function actionT10FormatPdf()
    {

        $request = Yii::$app->request->get();
        $t10Query = PayPayhd::find()
            ->select([PayPayhd::tableName() . '.empTitle', PayPayhd::tableName() . '.empNames', PayPayhd::tableName() . '.empSurname', PayPayhd::tableName() . '.empUPFNo', PayPayhd::tableName() . '.empNIC', PayPayetot::tableName() . '.*'])
            ->innerJoin(PayPayetot::tableName(), PayPayetot::tableName() . '.empUPFNo = ' . PayPayhd::tableName() . '.empUPFNo')
            ->orderBy([
                'CAST(' . PayPayhd::tableName() . '.empUPFNo AS signed)' => SORT_ASC
            ])->andFilterWhere([
                PayPayetot::tableName() . '.empUPFNo' => $request['upfNo']
            ]);

        $t10Command = $t10Query->createCommand();
        $t10Result = $t10Command->queryAll();

        return $this->renderPartial('t10-format-pdf', [
            'request' => $request,
            't10Format' => $t10Result
        ]);
    }
}
