<?php

use yii\web\JsExpression;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySemlSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Standing Order Allowances';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-bofy m-2">

        <?= \nullref\datatable\DataTable::widget([
            'tableOptions' => [
                'class' => 'table',
            ],
            // 'data' => $dataProvider->getModels(),
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
                //     'label' => 'Emp. Name',
                //     'value' =>  function ($model) {
                //         $employeemodel = new Employee();
                //         $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                //         return $employeeName;
                //     },
                //     'format' => 'raw',
                // ],
                [
                    'title' => 'SO Allow. Ref',
                    'data' => 'semlRef',
                ],
                [
                    'title' => 'SO Allow. Field',
                    'data' => 'payFields.fldName',
                ],
                [
                    'title' => 'SO Allow. Start',
                    'data' => 'semlStart',
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY");             
                                    }
                                }'),
                    'renderFilter' => new \yii\web\JsExpression('function() { ' .
                        'return jQuery(\'<input type="date" id="w4" class="form-control" style="width: 85px;" />\'); ' .
                        '}'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'SO Allow. End',
                    'data' => 'semlEnd',
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY");             
                                    }
                                }'),
                    'renderFilter' => new \yii\web\JsExpression('function() { ' .
                        'return jQuery(\'<input type="date" id="w5" class="form-control" style="width: 85px;" />\'); ' .
                        '}'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'Amount',
                    'data' => 'semlAmt',
                    'format' => ['currency'],
                    'sClass' => 'align-right',
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
            'ajax' => Yii::getAlias('@web/pay-seml/datatables'),

        ]) ?>

    </div>
</div>