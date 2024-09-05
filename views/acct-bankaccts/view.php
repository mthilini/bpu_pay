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

<div class="row acct-bankaccts-view">
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
                                                'attribute' => 'bactCBkLedg0.ledgDesc',
                                            ],
                                            [
                                                'label' => 'Payable Ledger 1',
                                                'attribute' => 'bactPayable10.ledgDesc',
                                            ],
                                            [
                                                'label' => 'Payable Ledger 2',
                                                'attribute' => 'bactPayable20.ledgDesc',
                                            ],
                                            [
                                                'label' => 'Payable Ledger 3',
                                                'attribute' => 'bactPayable30.ledgDesc',
                                            ],
                                            [
                                                'label' => 'Payable Ledger 4',
                                                'attribute' => 'bactPayable40.ledgDesc',
                                            ],
                                            [
                                                'label' => 'Payable Ledger 5',
                                                'attribute' => 'bactPayable50.ledgDesc',
                                            ],
                                            [
                                                'label' => 'Payable Ledger 6',
                                                'attribute' => 'bactPayable60.ledgDesc',
                                            ],
                                        ],
                                    ]) ?>

                                    <p>
                                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                        <?= Html::a('Close', ['/acct-bankaccts/index'], ['class' => 'btn btn-default pull-right']) ?>
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