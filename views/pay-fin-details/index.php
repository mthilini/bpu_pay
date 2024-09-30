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
                // [
                //     'title' => 'Medical Fund Contributor',
                //     // 'data' => function ($model) {
                //     //     return $model->medicalFundContributor == 1 ? 'Yes' : 'No';
                //     // }
                // ],
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
                // [
                //     'title' => 'Tax Consent',
                //     // 'data' => function ($model) {
                //     //     return $model->taxConsent == 1 ? 'Yes' : 'No';
                //     // }
                // ],
                [
                    'title' => 'Applicable Tax Table',
                    'data' => 'applicableTaxTable',
                ],
                // [
                //     'title' => 'SO Allow. Start',
                //     // 'data' =>  function ($model) {
                //     //     $bankLoanReleaseDate = date("d/m/Y", strtotime($model->bankLoanReleaseDate));
                //     //     return $bankLoanReleaseDate;
                //     // },
                // ],
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