<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PayStaxSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Staxes';
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
                'staxRef',
                'staxFld',
                'staxFld0.taxDesc',
                // [
                //     'label' => 'Tax Field',
                //     'value' => 'staxFld0.taxDesc'
                // ],
                'staxStart',
                // [
                //     'attribute' => 'S_Tax Start',
                //     'value' =>  function ($model) {
                //         $staxStart = date("d/m/Y", strtotime($model->staxStart));
                //         return $staxStart;
                //     },
                //     'format' => 'raw',
                // ],
                'staxEnd',
                // [
                //     'attribute' => 'S_Tax End',
                //     'value' =>  function ($model) {
                //         $staxEnd = date("d/m/Y", strtotime($model->staxEnd));
                //         return $staxEnd;
                //     },
                //     'format' => 'raw',
                // ],
                'staxAmt',
                // [
                //     'label' => 'Tax Amount',
                //     'attribute' => 'staxAmt',
                //     'format' => ['currency'],
                // ],
                'staxIncome',
                [
                    'label' => 'Tax Income',
                    'attribute' => 'staxIncome',
                    'format' => ['currency'],
                ],
                'staxMoney',
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
            'ajax' => Yii::getAlias('@web/pay-stax/datatables'),

        ]) ?>

    </div>
</div>