<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PaySdedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Standing Order Deductions';
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
                    'title' => 'Emp Upf No',
                    'data' => 'empUPFNo',
                ],
                // [
                //     //'attribute' => 'empUPFNo',
                //     'label' => 'Emp. Name',
                //     'value' =>  function ($model) {
                //         $employeemodel = new Employee();
                //         $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                //         return $employeeName;
                //     },
                //     'format' => 'raw',
                // ],
                [
                    'title' => 'SO Ded. Ref',
                    'data' => 'sdedRef',
                ],
                [
                    'title' => 'SO Ded. Fld',
                    'data' => 'sdedFld',
                ],
                [
                    'title' => 'SO Ded. Field',
                    'data' => 'payField0.fldName',
                ],
                [
                    'title' => 'SO Ded. Start',
                    'data' => 'sdedStart',
                    'sClass' => 'align-center',
                ],
                // [
                //     'attribute' => '',
                //     'value' =>  function ($model) {
                //         $sdedStart = date("d/m/Y", strtotime($model->sdedStart));
                //         return $sdedStart;
                //     },
                //     'format' => 'raw',
                // ],
                [
                    'title' => 'SO Ded. End',
                    'data' => 'sdedEnd',
                    'sClass' => 'align-center',
                ],
                // [
                //     'attribute' => '',
                //     'value' =>  function ($model) {
                //         $sdedEnd = date("d/m/Y", strtotime($model->sdedEnd));
                //         return $sdedEnd;
                //     },
                //     'format' => 'raw',
                // ],
                [
                    'title' => 'Amount (Rs.)',
                    'data' => 'sdedAmt',
                    'sClass' => 'align-right',
                    'format' => ['currency'],
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
            //'dataProvider' => $dataProvider,
            'withColumnFilter' => true,
            'serverSide' => true,
            'ajax' => Yii::getAlias('@web/pay-sded/datatables'),

        ]) ?>

    </div>
</div>