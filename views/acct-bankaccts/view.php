<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\AcctBankaccts $model */

$this->title = $model->bactAcctCode;
$this->params['breadcrumbs'][] = ['label' => 'Cashbook Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acct-bankaccts-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'bactAcctCode',
            'bactBankCode',
            'bactBankName',
            'bactAcctNo',
            'bactAcctName',
            'bactVoucher',
            'bactReceipt',
            'bactJournal',
            [
                'label' => 'Cashbook Ledger',
                'attribute' =>'bactCBkLedg0.ledgDesc',
            ],
            [
                'label' => 'Payable Ledger 1',
                'attribute' =>'bactPayable10.ledgDesc',
            ],
            [
                'label' => 'Payable Ledger 2',
                'attribute' =>'bactPayable20.ledgDesc',
            ],
            [
                'label' => 'Payable Ledger 3',
                'attribute' =>'bactPayable30.ledgDesc',
            ],
            [
                'label' => 'Payable Ledger 4',
                'attribute' =>'bactPayable40.ledgDesc',
            ],
            [
                'label' => 'Payable Ledger 5',
                'attribute' =>'bactPayable50.ledgDesc',
            ],
            [
                'label' => 'Payable Ledger 6',
                'attribute' =>'bactPayable60.ledgDesc',
            ],
        ],
    ]) ?>

</div>
