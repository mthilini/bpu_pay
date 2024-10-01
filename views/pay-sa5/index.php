<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\PaySa5Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'SA-5 Allowances';
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
                [
                    'title' => 'SA5 Ref',
                    'data' => 'sa5Ref',
                ],
                [
                    'title' => 'SA5 Field',
                    'data' => 'sa5Fld',
                ],
                [
                    'title' => 'SA5 Field Desc.',
                    'data' => 'sa5Fld0.a5Desc',
                ],
                [
                    "title" => "SA5 Start",
                    'data' => "sa5Start",
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
                    'title' => "SA5 End",
                    "data" => "sa5End",
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY");             
                                    }
                                }'),
                    'renderFilter' => new \yii\web\JsExpression('function() { ' .
                        'return jQuery(\'<input type="date" id="w6" class="form-control" style="width: 85px;" />\'); ' .
                        '}'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'SA5 Amount (Rs.)',
                    'data' => 'sa5Amt',
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
            'withColumnFilter' => true,
            'serverSide' => true,
            'ajax' => Yii::getAlias('@web/pay-sa5/datatables'),

        ]) ?>

    </div>
</div>