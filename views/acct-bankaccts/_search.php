<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctBankacctsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-bankaccts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <label>Amount</label>
                <div class="row">
                    <div class="col-6">
                        <input id="a_min" name="a_min" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('a_min', this.value, 2);" min="0" <?php if(isset($request['a_min'])) echo "value=\"". $request['a_min'] . "\""; ?> />
                    </div>
                    <div class="col-6">
                        <input id="a_max" name="a_max" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('a_max', this.value, 2);" min="0" <?php if (isset($request['a_max'])) echo "value=\"" . $request['a_max'] . "\""; ?> />
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 col-xl-4">
                <label>Duration</label>
                <div class="row">
                    <div class="col-6">
                        <input id="d_min" name="d_min" class="form-control" type="date" />
                    </div>
                    <div class="col-6">
                        <input id="d_max" name="d_max" class="form-control" type="date" />
                    </div>
                </div>
            </div>
        </div>

        <br />

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary btn-sm']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />
