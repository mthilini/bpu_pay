<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayIprmstSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-pay-iprmst-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'action' => ['/pay-iprmst/deduct-indi-annual-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <label>Employee</label>
                <input type="text" id="empUPFNo" name="empUPFNo" class="form-control" value="<?= (isset($_REQUEST['empUPFNo']) && !empty($_REQUEST['empUPFNo'])) ? $_REQUEST['empUPFNo'] : ''; ?>" title="1 to 8 characters" maxlength="8">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <label>Year</label>
                <input type="text" id="year" name="year" class="form-control" value="<?= (isset($_REQUEST['year']) && !empty($_REQUEST['year'])) ? $_REQUEST['year'] : ''; ?>" title="1 to 4 characters" maxlength="4">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <label>Field</label>
                <select name="fldCode" id="fldCode" class="form-control">
                    <option value="0">All</option>
                    <?php if ($payFields != null) {
                        foreach ($payFields as $key => $payField) {
                    ?>
                            <option value="<?= $payField['fldCode']; ?>" <?= (!empty($request['fldCode']) && $request['fldCode'] == $payField['fldCode']) ? 'selected="selected"' : '' ?>><?= $payField['fldName']; ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-lg-2 col-md-3 col-sm-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-iprmst/deduct-indi-annual-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />