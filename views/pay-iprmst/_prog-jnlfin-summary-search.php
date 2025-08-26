<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayIprSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-pay-iprmst-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'action' => ['/pay-iprmst/prog-jnlfin-summary-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1">
                <label>Month</label>
                <input type="text" id="month" name="month" class="form-control" value="<?= (isset($_REQUEST['month']) && !empty($_REQUEST['month'])) ? $_REQUEST['month'] : ''; ?>" title="1 to 2 characters" maxlength="2">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <label>Year</label>
                <input type="text" id="year" name="year" class="form-control" value="<?= (isset($_REQUEST['year']) && !empty($_REQUEST['year'])) ? $_REQUEST['year'] : ''; ?>" title="1 to 4 characters" maxlength="4">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <label>Academic</label>
                <select name="empAcademic" id="empAcademic" class="form-control">
                    <option value="">All</option>
                    <option value="A" <?= (!empty($request['empAcademic']) && $request['empAcademic'] == 'A') ? 'selected="selected"' : '' ?>>Academic</option>
                    <option value="N" <?= (!empty($request['empAcademic']) && $request['empAcademic'] == 'N') ? 'selected="selected"' : '' ?>>Non Academic</option>
                </select>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <label>Programme</label>
                <input type="text" id="deptProg" name="deptProg" class="form-control" value="<?= (isset($_REQUEST['deptProg']) && !empty($_REQUEST['deptProg'])) ? $_REQUEST['deptProg'] : ''; ?>" title="1 to 2 characters" maxlength="2">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <label>Option</label>
                <select name="option" id="option" class="form-control">
                    <option value="monthly" <?= (!empty($request['option']) && $request['option'] == 'monthly') ? 'selected="selected"' : '' ?>>Monthly</option>
                    <option value="cumalative" <?= (!empty($request['option']) && $request['option'] == 'cumalative') ? 'selected="selected"' : '' ?>>Cumalative</option>
                </select>
            </div>
            <div class="form-group col-lg-2 col-md-3 col-sm-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-iprmst/prog-jnlfin-summary-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />