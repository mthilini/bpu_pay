<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFunds $model */

$this->title = $model->fundCode;
$this->params['breadcrumbs'][] = ['label' => 'Fund Management Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acct-fm-funds-view">

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
            'fundCode',
            'fundName',
            'fundBankType',
            //'fundBankCode',
            'fundBankCode0.bankName',
            'fundBankAcct',
            'fundLedg0.ledgDesc',
        ],
    ]) ?>

</div>