<?php

use app\models\AcctLedgmain;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

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
                                <button id="btnExport" class="btn btn-info" onclick="fnExcelReport();"> Export Excel</button>
                                <input class="btn btn-primary" type="button" onclick="generatePDF('<?= $this->title;?>', 'act-ledgmain')" value="Export PDF" />
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
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <iframe id="txtArea1" style="display:none"></iframe>
</div>