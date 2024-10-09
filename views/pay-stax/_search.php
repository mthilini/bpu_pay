<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayStaxSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-stax-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-2 justify-center">S_Tax :</div>
                    <div class="col-3">
                        <label for="from">Start</label>
                        <input id="from" name="from" class="form-control" type="date" <?php if (isset($request['from'])) echo "value=\"" . $request['from'] . "\""; ?> />
                    </div>
                    <div class="col-3">
                        <label for="to">End</label>
                        <input id="to" name="to" class="form-control" type="date" <?php if (isset($request['to'])) echo "value=\"" . $request['to'] . "\""; ?> />
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-2 justify-center">Tax Amount :</div>
                    <div class="col-4">
                        <label for="a_min">Min</label>
                        <input id="a_min" name="a_min" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('a_min', this.value, 2);" min="0" <?php if (isset($request['a_min'])) echo "value=\"" . $request['a_min'] . "\""; ?> />
                    </div>
                    <div class="col-4">
                        <label for="a_max">Max</label>
                        <input id="a_max" name="a_max" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('a_max', this.value, 2);" min="0" <?php if (isset($request['a_max'])) echo "value=\"" . $request['a_max'] . "\""; ?> />
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-2 justify-center">Tax Income :</div>
                    <div class="col-4">
                        <label for="i_min">Min</label>
                        <input id="i_min" name="i_min" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('i_min', this.value, 2);" min="0" <?php if (isset($request['i_min'])) echo "value=\"" . $request['i_min'] . "\""; ?> />
                    </div>
                    <div class="col-4">
                        <label for="i_max">Max</label>
                        <input id="i_max" name="i_max" class="form-control" type="number" step="0.01" onblur="setNumberDecimal('i_max', this.value, 2);" min="0" <?php if (isset($request['i_max'])) echo "value=\"" . $request['i_max'] . "\""; ?> />
                    </div>
                </div>
                <br>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm', 'style' => 'margin-right: 3px;']) ?>
            <?= Html::a('Reset', ['/pay-stax/report'], ['class' => 'btn btn-secondary btn-sm']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />