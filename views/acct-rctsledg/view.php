<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledg $model */

//$this->title = $model->id;
$this->title = "View Receipt-Ledger";
$this->params['breadcrumbs'][] = ['label' => 'Receipt-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row acct-rctsledg-view">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            //'id',
                                            'rctDate',
                                            'rctNo',
                                            'rctSub',
                                            'rctLedger',
                                            //'rctAmount',
                                            [
                                                'label' => 'Amount (Rs.)',
                                                'attribute' => 'rctAmount',
                                                //'contentOptions' => ['class' => 'col-lg-1'],
                                                'format' => ['currency'],
                                            ],
                                            'rctRmks',
                                            'rctCashBk',
                                            'rctDept',
                                        ],
                                    ]) ?>

                                    <p>
                                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                        <?= Html::a('Close', ['/acct-rctsledg'], ['class' => 'btn btn-default pull-right']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>