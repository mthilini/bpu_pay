<?php

namespace app\controllers;

use app\models\PayPayhdSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ExcelController extends Controller
{

    public function actionPersonalInfoReport()
    {
        $searchModel = new PayPayhdSearch();
        $query = $searchModel->search([])->query;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $query->orderBy([
            'empUPFNo' => SORT_ASC,
            'empSurname' => SORT_ASC
        ]);

        $OpenTBS = new \hscstudio\export\OpenTBS;

        $template = Yii::getAlias('@hscstudio/export') . '/templates/opentbs/pay_payhd-excel.xlsx';
        $OpenTBS->LoadTemplate($template);

        $no = 1;
        $data = [];
        
        foreach ($dataProvider->getModels() as $model) {
            $data[] = [
                'no' => $no++,
                'empNIC' => $model->empNIC,
                'empTitle' => $model->empTitle,
                'empSurname' => $model->empSurname,
                'empInitials' => $model->empInitials,
                'empNames' => $model->empNames,
                'empGender' => ($model->empGender == '0' ? 'Male' : 'Female'),
                'empAddress1' => $model->empAddress1,
                'empAddress2' => $model->empAddress2,
                'empAddress3' => $model->empAddress3,
                'empDept' => $model->empDept,
                'deptName' => ($model->payDept != null) ? $model->payDept->deptName : '',
                'empDesig' => $model->empDesig,
                'desigName' => ($model->payDesig != null) ? $model->payDesig->desigName : '',
                'empSalCode' => $model->empSalCode,
                'empSalScale' => $model->empSalScale,
                'empBasic' => $model->empBasic,
                'empDtAppt' => $model->empDtAppt,
                'empDtAssm' => $model->empDtAssm,
                'empDtIncr' => $model->empDtIncr,
                'empDtConf' => $model->empDtConf,
                'empDtBirth' => $model->empDtBirth,
                'empUPFNo' => $model->empUPFNo,
                'empETFNo' => $model->empETFNo,
                'empUPNo' => $model->empUPNo,
                'empUPContr' => ($model->empUPContr == '1' ? 'Yes' : 'No'),
                'empBankCode' => $model->empBankCode,
                'sbnkAName' => ($model->payBank != null) ? $model->payBank->bankName : '',
                'empAcctNo' => $model->empAcctNo,
                'empAcctName' => $model->empAcctName,
                'empStatus' => $model->empStatus,
                'empAcademic' => ($model->empAcademic == 'A' ? 'Academic' : 'Non Academic'),
                'empTempEmp' => ($model->empTempEmp == 'P' ? 'Permanent' : 'Temporary'),
                'empDtTemp' => $model->empDtTemp,
                'empGrade' => $model->empGrade,
                'empResearch' => ($model->empResearch == 'R' ? 'Yes' : 'No'),
                'empTax' => ($model->empTax == '1' ? 'Yes' : 'No'),
                'empTaxTbl' => $model->empTaxTbl,
                'empLoanAmt' => $model->empLoanAmt,
                'empLoanDate' => $model->empLoanDate,
            ];
        }

        $OpenTBS->MergeBlock('data', $data);
        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'employee-details.xlsx');

        exit;
    }
}
