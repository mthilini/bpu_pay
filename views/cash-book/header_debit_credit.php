<div class="row d-flex align-items-center justify-content-start">
    <div class="col-4 offset-1">
        <input type="radio" id="debit" name="col" />
        <label for="c">Debit</label>
    </div>
    <div class="col-4">
        <input type="radio" id="credit" name="col" />
        <label for="l">Credit</label>
    </div>
    <div class="col-3">
        <?= $form->field($model_cash, 'paySub')->textInput(['maxlength' => true,]) ?>
    </div>
</div>