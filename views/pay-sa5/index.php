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
                'id',
                'empUPFNo',
                'sa5Ref',
                'sa5Fld',
                'sa5Fld0.a5Desc',
                // [
                //     'label' => 'SA5 Field Desc.',
                //     'value' => 'sa5Fld0.a5Desc'
                // ],
                'sa5Start',
                // [
                //     'attribute' => 'SA5 Start',
                //     'value' =>  function ($model) {
                //         $sa5Start = date("d/m/Y", strtotime($model->sa5Start));
                //         return $sa5Start;
                //     },
                //     'format' => 'raw',
                // ],
                'sa5End',
                // [
                //     'attribute' => 'SA5 End',
                //     'value' =>  function ($model) {
                //         $sa5End = date("d/m/Y", strtotime($model->sa5End));
                //         return $sa5End;
                //     },
                //     'format' => 'raw',
                // ],
                'sa5Amt',
                // [
                //     'label' => 'SA5 Amount (Rs.)',
                //     'attribute' => 'sa5Amt',
                //     'format' => ['currency'],
                // ],
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