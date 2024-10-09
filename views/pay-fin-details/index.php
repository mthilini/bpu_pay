<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetailsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employee Details (Finance)';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-bofy m-2">

        <?= \nullref\datatable\DataTable::widget([
            'tableOptions' => [
                'class' => 'table',
            ],
            'columns' => [
                [
                    'title' => 'ID',
                    'data' => 'id',
                ],
                [
                    'title' => 'NIC',
                    'data' => 'nic',
                ],
                'title',
                [
                    'title' => 'Employee Name',
                    'data' => 'surname',
                ],
                [
                    'title' => 'EPF No',
                    'data' => 'epfNo',
                ],
                [
                    'title' => 'Medical Fund Contributor',
                    'data' => 'medicalFundContributor',
                    "render" => new JsExpression('function(data, type, full){
                                    if (data == true) {
                                        return "Yes";
                                    } else {
                                        return "No";             
                                    }
                                }'),
                    'sClass' => 'align-center',
                    'filter' => [true => 'Yes', false => 'No'],
                ],
                [
                    'title' => 'Salary Bank Code',
                    'data' => 'salaryBankCode',
                ],
                [
                    'title' => 'Bank Account No',
                    'data' => 'bankAccountNo',
                ],
                [
                    'title' => 'Bank Account Name',
                    'data' => 'bankAccountName',
                ],
                [
                    'title' => 'Tax Consent',
                    'data' => 'taxConsent',
                    "render" => new JsExpression('function(data, type, full){
                                    if (data == true) {
                                        return "Yes";
                                    } else {
                                        return "No";             
                                    }
                                }'),
                    'sClass' => 'align-center',
                    'filter' => [true => 'Yes', false => 'No'],
                ],
                [
                    'title' => 'Applicable Tax Table',
                    'data' => 'applicableTaxTable',
                ],
                [
                    "title" => "Bank Loan Release Date",
                    'data' => "bankLoanReleaseDate",
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY");             
                                    }
                                }'),
                    'renderFilter' => new \yii\web\JsExpression('function() { ' .
                        'return jQuery(\'<input type="date" id="w10" class="form-control" style="width: 85px;" />\'); ' .
                        '}'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'Other Info',
                    'data' => 'otherInfo',
                ],
                [
                    'class' => 'nullref\datatable\LinkColumn',
                    'queryParams' => ['id'],
                    'render' => new JsExpression('function render(data, type, row, meta ){
                        return "<a href=\"view?id="+row["id"]+"\" class=\"btn btn-info btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to view details\">View</a><a href=\"update?id="+row["id"]+"\" class=\"btn btn-warning btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to update details\">Update</a>"
                    }'),
                ],
                [
                    'class' => 'nullref\datatable\LinkColumn',
                    'url' => ['delete'],
                    'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post', 'class' => 'btn btn-danger btn-sm', 'style' => 'font-size: 9px;'],
                    'label' => 'Delete',
                ],
            ],
            'withColumnFilter' => true,
            'serverSide' => true,
            'ajax' => Yii::getAlias('@web/pay-fin-details/datatables'),

        ]) ?>

    </div>
</div>