<?php

use app\models\Employee;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PayDeductionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Deductions';
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
                    'title' => 'Emp. UPF No',
                    'data' => 'empUPFNo',
                ],
                [
                    'title' => 'Emp. Name',
                    'data' => 'empUPFNo',
                    "render" => new JsExpression('function(data, type, full){
                                    // var ename = "Name NOT in HR Info";
                                    jQuery.ajax({
                                        method: "POST",
                                        url: "employee?empUPFNo=" + data,
                                        headers: {
                                            "X-CSRF-TOKEN": $("meta[name=\'csrf-token\']").attr("content")
                                        },
                                        success: function (ename) {
                                            return ename;
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            return "Name NOT in HR Info";
                                        }
                                    });
                                    // return ename
                                }'),
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
                    'title' => 'Month',
                    'data' => 'dedMon',
                    'sClass' => 'align-right',
                ],
                [
                    'title' => 'Year',
                    'data' => 'dedYear',
                    'sClass' => 'align-right',
                ],
                [
                    'title' => 'Deduction (Rs.)',
                    'data' => 'dedDeduction',
                    'format' => ['currency'],
                    'sClass' => 'align-right',
                ],
                [
                    'class' => 'nullref\datatable\LinkColumn',
                    'queryParams' => ['id'],
                    'render' => new JsExpression('function render(data, type, row, meta ){
                        return "<a href=\"view?id="+row["id"]+"\" class=\"btn btn-info btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to view details\">View</a><a href=\"update?id="+row["id"]+"\" class=\"btn btn-warning btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to update details\">Update</a>"
                    }'),
                    'sClass' => 'view-edit-div align-center'
                ],
                [
                    'class' => 'nullref\datatable\LinkColumn',
                    'url' => ['delete'],
                    'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post', 'class' => 'btn btn-danger btn-sm', 'style' => 'font-size: 9px;'],
                    'label' => 'Delete',
                    'sClass' => 'align-center'
                ],
            ],
            'withColumnFilter' => true,
            'serverSide' => true,
            'ajax' => Yii::getAlias('@web/pay-deductions/datatables'),

        ]) ?>

    </div>
</div>