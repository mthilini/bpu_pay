<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFundsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fund Management Types';
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
                'fundCode',
                'fundName',
                [
                    'title' => 'Bank Type',
                    'data' => 'fundBankType',
                ],
                [
                    'title' => 'Bank Name',
                    'data' => 'fundBankCode',
                ],
                // [
                //     'attribute' => 'fundBankCode',
                //     'label' => 'Bank Name',
                //     'value' =>  function ($model) {
                //         $bankModel = new PayBank();
                //         $bankName = $bankModel->getBankName($model->fundBankCode);
                //         return $bankName;
                //     },
                //     'format' => 'raw',
                //     'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:350px;']
                // ],
                [
                    'title' => 'Bank Account',
                    'data' => 'fundBankAcct',
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
            'ajax' => Yii::getAlias('@web/acct-fm-funds/datatables'),

        ]) ?>

    </div>
</div>