<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctTrialdtlSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-trialdtl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-2">
                <label>Month</label>
                <select name="month" id="month" class="form-control">
                    <option></option>
                    <?php
                    $months = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
                    if ($months != null) {
                        foreach ($months as $key => $month) {
                    ?>
                            <option <?= (!empty($request['month']) && $request['month'] == $month) ? 'selected="selected"' : '' ?>><?= $month; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-2">
                <label>TB</label>
                <select name="tb" id="tb" class="form-control">
                    <option></option>
                    <?php
                    $tbs = array('UNI', 'ETF');
                    if ($tbs != null) {
                        foreach ($tbs as $key => $tb) {
                    ?>
                            <option <?= (!empty($request['tb']) && $request['tb'] == $tb) ? 'selected="selected"' : '' ?>><?= $tb; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/acct-trialdtl/report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />