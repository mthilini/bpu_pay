<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PaySbnkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bank Standing Orders';
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
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'Emp. EPF No',
                    'data' => 'empUPFNo',
                ],
                // [
                //     'label' => 'Emp. Name',
                //     'value' =>  function ($model) {
                //         $employeemodel = new Employee();
                //         $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                //         return $employeeName;
                //     },
                //     'format' => 'raw',
                // ],
                [
                    'title' => 'SO Bank Ref.',
                    'data' => 'sbnkRef',
                ],
                [
                    'title' => 'SO Start',
                    'data' => 'sbnkStart',
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY");             
                                    }
                                }'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'SO End',
                    'data' => 'sbnkEnd',
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY");             
                                    }
                                }'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'Amount (Rs.)',
                    'data' => 'sbnkAmt',
                    'format' => ['currency'],
                    'sClass' => 'align-right',
                ],
                [
                    'title' => 'SO Bank',
                    'data' => 'sbnkBank',
                ],
                [
                    'title' => 'SO Account',
                    'data' => 'sbnkAcct',
                ],
                [
                    'title' => 'SO Account Name',
                    'data' => 'sbnkAName',
                ],
                [
                    'title' => 'SO Loan',
                    'data' => 'sbnkLoan',
                    'filter' => ['1' => 'Yes', '0' => 'No'],
                ],
                [
                    'class' => 'nullref\datatable\LinkColumn',
                    'queryParams' => ['id', 'empUPFNo'],
                    'render' => new JsExpression('function render(data, type, row, meta ){
                        return "<a href=\"view?id="+row["id"]+"\" class=\"btn btn-info btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to view details\">View</a><a href=\"update?id="+row["id"]+"\" class=\"btn btn-warning btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to update details\">Update</a><a href=\"create-new?upf="+row["empUPFNo"]+"\" class=\"btn btn-secondary btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to update details\">Add New</a>"
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
            'ajax' => Yii::getAlias('@web/pay-sbnk/datatables'),

        ]) ?>

    </div>
</div>