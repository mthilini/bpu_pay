<?php
use yii\helpers\Html;

?>

<div id="cash_items_payment1">
    <div class="form-group">
        <div class="row d-flex align-items-center justify-content-start">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-4">
                        <input type="radio" id="chodb" name="chodb" />
                        <label for="c">Cheque</label>
                    </div>
                    <div class="col-4">
                        <input type="radio" id="chodb" name="chodb" />
                        <label for="c">Direct Debit</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-8">
                        <label>Cheque No.</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col-4 d-flex align-items-end justify-content-start">
                        <button type="button" class="btn btn-sm btn-secondary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model_cash, 'payType')->dropDownList(
                ['Normal' => 'Normal', 'Shroff' => 'Shroff', 'Examination' => 'Examination', 'Staff' => 'Staff', 'Utilities' => 'Utilities', 'Vehicle' => 'Vehicle'],
                [
                    'required' => true,
                    'prompt' => [
                        'text' => 'Select a Payment Type',
                        'options' => ['disabled' => true, 'selected' => true]
                    ]
                ]
            ) ?>
        </div>
        <div class="col-md-8 col-lg-6">
            <?= $form->field($model_cash, 'payPayee')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $this->render('amount_cash_pay', [
        'form' => $form,
        'model_ledger' => $model_cash
    ]) ?>

</div>