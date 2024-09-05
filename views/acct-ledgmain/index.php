<?php

use app\models\AcctLedgmain;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use sdelfi\datatables\DataTables;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgmainSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Account Main Ledger Codes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row acct-ledgmain-index">
    <table width="100%" xmlns="http://www.w3.org/1999/html">
        <tr>
            <td valign="top">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-header">
                            <span class="with-border-box">
                                <?= Html::a('Create Acc. Ledge-main', ['create'], ['class' => 'btn btn-success']) ?>
                            </span>
                        </div>
                        <div class="panel-body panel-body-index">
                            <div class="user-view">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        'mainCode',
                                        'mainDesc',
                                        [
                                            'class' => ActionColumn::className(),
                                            'urlCreator' => function ($action, AcctLedgmain $model, $key, $index, $column) {
                                                return Url::toRoute([$action, 'id' => $model->id]);
                                            }
                                        ],
                                    ],
                                ]); ?>
                            </div>

                            <div class="user-view">
                                <?= DataTables::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //columns
                                        'mainCode',
                                        'mainDesc',
                                        [
                                            'class' => ActionColumn::className(),
                                            'urlCreator' => function ($action, AcctLedgmain $model, $key, $index, $column) {
                                                return Url::toRoute([$action, 'id' => $model->id]);
                                            }
                                        ],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>