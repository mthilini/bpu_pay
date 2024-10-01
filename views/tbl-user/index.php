<?php

use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\TblUserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
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
                'username',
                'email',
                [
                    'title' => 'Created At',
                    'data' => 'created_at',
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY hh:mm:ss");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY hh:mm:ss");             
                                    }
                                }'),
                    'sClass' => 'align-center',
                ],
                [
                    'title' => 'Updated At',
                    'data' => 'updated_at',
                    "render" => new JsExpression('function(data, type, full){
                                    if (type == "display") {
                                        return moment(new Date(data)).locale("el").format("DD/MM/YYYY hh:mm:ss");
                                    } else {
                                        return moment(new Date(data)).format("DD/MM/YYYY hh:mm:ss");             
                                    }
                                }'),
                    'sClass' => 'align-center',
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
            //'dataProvider' => $dataProvider,
            'withColumnFilter' => true,
            'serverSide' => true,
            'ajax' => Yii::getAlias('@web/tbl-user/datatables'),

        ]) ?>

    </div>
</div>