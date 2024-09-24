<?php
use yii\helpers\Html;

?>

<div id="cash_items_receipt">
    <div class="form-group">
        <div class="row d-flex align-items-center justify-content-start">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-4">
                        <input type="radio" id="chodb" name="chodb" />
                        <label for="chodb">Cheque</label>
                    </div>
                    <div class="col-4">
                        <input type="radio" id="chodb" name="chodb" />
                        <label for="chodb">Cash</label>
                    </div>
                    <div class="col-4">
                        <input type="radio" id="chodb" name="chodb" />
                        <label for="chodb">Direct Debit</label>
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
            <?= $form->field($model_cash, 'rctType')->dropDownList(
                ['Normal' => 'Normal', 'External Examination' => 'External Examination', 'Staff' => 'Staff'],
                [
                    'required' => true,
                    'prompt' => [
                        'text' => 'Select Receipt Type',
                        'options' => ['disabled' => true, 'selected' => true]

                    ]
                ]
            ) ?>
        </div>
        <div class="col-md-8 col-lg-6">
            <?= $form->field($model_cash, 'rctName')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $this->render('amount_cash_rct', [
        'form' => $form,
        'model_ledger' => $model_cash
    ]) ?>

</div>