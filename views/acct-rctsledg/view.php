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
<div class="acct-rctsledg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'rctDate',
            'rctNo',
            'rctSub',
            'rctLedger',
            //'rctAmount',
            ['label' => 'Amount (Rs.)',
                'attribute' =>'rctAmount',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format'=>['currency'],
            ],
            'rctRmks',
            'rctCashBk',
            'rctDept',
        ],
    ]) ?>

</div>
