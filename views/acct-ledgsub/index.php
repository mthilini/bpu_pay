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