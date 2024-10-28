<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctMainLedgSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-mainledg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-2">
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
            <div class="form-group col-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/acct-mainledg/report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />