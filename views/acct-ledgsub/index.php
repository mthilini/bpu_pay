<?php

use app\models\AcctLedgsub;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgsubSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ledger Sub Codes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row acct-ledgsub-index">
    <table width="100%" xmlns="http://www.w3.org/1999/html">
        <tr>
            <td valign="top">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="box-header">
                            <span class="with-border-box">
                                <?= Html::a('Create Ledger Sub Code', ['create'], ['class' => 'btn btn-success']) ?>
                                <!-- <div class="export_file">
                                    <label for="export-file" class="export-file-btn" title="Export File"></label>
                                    <div class="export-file-option">
                                        <label>Export As &nbsp; &#10140;</label>
                                        <label for="export-file" id="toPDF">
                                            PDF <i class='fas fa-file-pdf'></i>
                                        </label>
                                    </div>
                                </div> -->
                                <button id="btnExport" class="btn btn-info" onclick="fnExcelReport();">Excel</button>
                                <input class="btn btn-primary" type="button" onclick="generatePDF('<?= $this->title;?>', 'acct-ledgsub')" value="PDF" />
                                <input class="btn btn-info" type="button" onclick="generateJson('<?= $this->title;?>', 'acct-ledgsub')" value="Json" />
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
                                        [
                                            'attribute' => 'lsubCode',
                                            'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
                                        ],
                                        [
                                            'attribute' => 'lsubDesc',
                                            'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:700px;']
                                        ],
                                        [
                                            'class' => ActionColumn::className(),
                                            'urlCreator' => function ($action, AcctLedgsub $model, $key, $index, $column) {
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