<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledg $model */

//$this->title = $model->id;
$this->title = "View Payment-Ledger";
$this->params['breadcrumbs'][] = ['label' => 'Payment-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acct-payledg-view">

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
            'payDate',
            'payVch',
            'paySub',
            'payLedg',
            //'payAmount',
            ['label' => 'Amount (Rs.)',
                'attribute' =>'payAmount',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format'=>['currency'],
            ],
            'payRmks',
            'payCashBk',
            'payDept',
        ],
    ]) ?>

</div>
