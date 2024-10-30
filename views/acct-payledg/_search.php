<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledgSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-payledg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="form-group">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="cash" name="optwise" value="cash" <?= (!isset($request['optwise']) || (isset($request['optwise']) && ($request['optwise']) == 'cash')) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="cash">Cashbook Wise</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="ledg" name="optwise" value="ledg" <?= (isset($request['optwise']) && $request['optwise'] == 'ledg') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="ledg">Ledger Wise</label>
                </div>
            </div>
            <div class="col-2 cash-div <?= (!isset($request['optwise']) || (isset($request['optwise']) && ($request['optwise']) == 'cash')) ? 'show' : ''; ?>">
                <label>Cashbook</label>
                <select name="cashbook" id="cashbook" class="form-control">
                    <option></option>
                    <?php if ($cashbooks != null) {
                        foreach ($cashbooks as $key => $cashbook) {
                    ?>
                            <option <?= (!empty($request['cashbook']) && $request['cashbook'] == $cashbook) ? 'selected="selected"' : '' ?>><?= $cashbook; ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="col-2 ledg-div <?= (isset($request['optwise']) && $request['optwise'] == 'ledg') ? 'show' : ''; ?>">
                <label>Ledger</label>
                <select name="ledger" id="ledger" class="form-control">
                    <option></option>
                    <?php if ($ledgers != null) {
                        foreach ($ledgers as $key => $ledger) {
                    ?>
                            <option <?= (!empty($request['ledger']) && $request['ledger'] == $ledger) ? 'selected="selected"' : '' ?>><?= $ledger; ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="col-3">
                <label>Date</label>
                <div class="row">
                    <div class="col-6">
                        <input id="from" name="from" class="form-control" type="date" <?php if (!empty($request['from'])) echo "value=\"" . $request['from'] . "\""; ?> />
                    </div>
                    <div class="col-6">
                        <input id="to" name="to" class="form-control" type="date" <?php if (!empty($request['to'])) echo "value=\"" . $request['to'] . "\""; ?> />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/acct-payledg/report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />