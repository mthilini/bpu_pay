<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayhd $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-pay-iprmst-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['/pay-payhd/basic-salary-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <label>Academic</label>
                <select name="empAcademic" id="empAcademic" class="form-control">
                    <option value="">All</option>
                    <option value="A" <?= (!empty($request['empAcademic']) && $request['empAcademic'] == 'A') ? 'selected="selected"' : '' ?>>Academic</option>
                    <option value="N" <?= (!empty($request['empAcademic']) && $request['empAcademic'] == 'N') ? 'selected="selected"' : '' ?>>Non Academic</option>
                </select>
            </div>
            <div class="form-group col-lg-2 col-md-3 col-sm-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-payhd/basic-salary-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />