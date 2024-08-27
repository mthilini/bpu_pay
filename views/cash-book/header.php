<?php
use yii\helpers\ArrayHelper;
use app\models\AcctBankaccts;
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-sm-4 col-8">
        <?= $form->field($model_cash, 'payCashBk')->dropDownList(
            ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctName')->all(), 'bactAcctCode', 'bactAcctName'),
            [
                'required' => true,
                'prompt' => [
                    'text' => 'Select a Cashbook',
                    'options' => ['disabled' => true, 'selected' => true]
                ],
                'onchange' => 'cashbook(this.value)',
            ]
        ) ?>
    </div>
    <div class="col-sm-2 col-4">
        <label></label>
        <input type="text" id="cb_code" name="cb_code" class="form-control" maxlength="2" readonly/>
    </div>
    <div class="col-sm-3">
        <?= $form->field($model_cash, 'payVch')->textInput() ?>
    </div>
    <div class="col-sm-3">
        <label><?= $model_cash->getAttributeLabel('payDate') ?></label>
        <input type="date" id="<?= Html::getInputId($model_cash, 'payDate') ?>" name="<?= Html::getInputName($model_cash, 'payDate') ?>" class="form-control" pattern="\d{4}-\d{2}-\d{2}" onblur="checkDate(this.value);"/>
    </div>
</div>

<script>
    function checkDate(dateString) {
        if (isDateValid(dateString)) {
            document.getElementById('<?= Html::getInputId($model_cash, 'payDate') ?>').setCustomValidity("");
        }
        else {
            document.getElementById('<?= Html::getInputId($model_cash, 'payDate') ?>').setCustomValidity("Date is invalid.");
        }
    }

    function isDateValid(dateString) {
        return !isNaN(new Date(dateString));
    }

    function cashbook(value) {
        document.getElementById('cb_code').value = value;
    }
</script>