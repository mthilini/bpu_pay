<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayIncomeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-income-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-2 justify-center">Income (Rs.)</div>
                    <div class="col-4">
                        <label for="a_min">From</label>
                        <input id="a_min" name="a_min" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('a_min', this.value, 2);" min="0" <?php if (isset($request['a_min'])) echo "value=\"" . $request['a_min'] . "\""; ?> />
                    </div>
                    <div class="col-4">
                        <label for="a_max">To</label>
                        <input id="a_max" name="a_max" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('a_max', this.value, 2);" min="0" <?php if (isset($request['a_max'])) echo "value=\"" . $request['a_max'] . "\""; ?> />
                    </div>
                </div>
                <br>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm', 'style' => 'margin-right: 3px;']) ?>
            <?= Html::a('Reset', ['/pay-income/report'], ['class' => 'btn btn-secondary btn-sm']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />