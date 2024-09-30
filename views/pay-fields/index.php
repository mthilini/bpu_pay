<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PayFieldsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fixed Salary Fields';
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
                    'title' => 'Field Code',
                    'data' => 'fldCode',
                ],
                [
                    'title' => 'Field Name',
                    'data' => 'fldName',
                ],
                // 'fldUPF:boolean',
                [
                    'title' => 'UPF',
                    'data' => 'fldUPF',
                    'filter' => ['true' => 'Yes', 'false' => 'No'],
                ],
                // 'fldETF:boolean',
                [
                    'title' => 'ETF',
                    'data' => 'fldETF',
                    'filter' => ['true' => 'Yes', 'false' => 'No'],
                ],
                [
                    'title' => 'Field Type',
                    'data' => 'payFieldType.typeName',
                ],
                [
                    'title' => 'Category',
                    'data' => 'fldCat',
                ],
                [
                    'class' => 'nullref\datatable\LinkColumn',
                    'queryParams' => ['id'],
                    'render' => new JsExpression('function render(data, type, row, meta ){
                        return "<a href=\"view?id="+row["id"]+"\" class=\"btn btn-info btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to view details\">View</a><a href=\"update?id="+row["id"]+"\" class=\"btn btn-warning btn-sm mr-1\" style=\"font-size: 9px;\" title=\"Click to update details\">Update</a>"
                    }'),
                    'sClass' => 'align-center view-edit-div',
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
            'ajax' => Yii::getAlias('@web/pay-fields/datatables'),

        ]) ?>

    </div>
</div>