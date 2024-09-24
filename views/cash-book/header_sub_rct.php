<div class="row d-flex align-items-center justify-content-start">
    <div class="col-4 offset-1">
        <input type="radio" id="cash" name="col" onclick="chcol('cash');"/>
        <label for="c">Cash</label>
    </div>
    <div class="col-4">
        <input type="radio" id="ledger" name="col" onclick="chcol('ledger');"/>
        <label for="l">Ledger</label>
    </div>
    <div class="col-3">
        <?= $form->field($model_cash, 'rctSub')->textInput(['maxlength' => true,]) ?>
    </div>
</div>