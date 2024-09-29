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
                'id',
                'empUPFNo',
                // [
                //     'label' => 'Emp. Name',
                //     'value' =>  function ($model) {
                //         $employeemodel = new Employee();
                //         $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                //         return $employeeName;
                //     },
                //     'format' => 'raw',
                // ],
                'sbnkRef',
                'sbnkStart',
                'sbnkEnd',
                'sbnkAmt',
                // [
                //     'label' => 'Amount (Rs.)',
                //     'attribute' => 'sbnkAmt',
                //     //'contentOptions' => ['class' => 'col-lg-1'],
                //     'format' => ['currency'],
                // ],
                'sbnkBank',
                'sbnkAcct',
                'sbnkAName',
                'sbnkLoan',
                // [
                //     'label' => 'SO Loan',
                //     'value' => function ($model) {
                //         return $model->sbnkLoan == 1 ? 'Yes' : 'No';
                //     }
                // ],
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