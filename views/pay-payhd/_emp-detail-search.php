<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayhdSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    .checkbox-wrapper-19 {
        box-sizing: border-box;
        --background-color: #fff;
        --checkbox-height: 25px;
        margin-bottom: 5px;
    }

    @-moz-keyframes dothabottomcheck-19 {
        0% {
            height: 0;
        }

        100% {
            height: calc(var(--checkbox-height) / 2);
        }
    }

    @-webkit-keyframes dothabottomcheck-19 {
        0% {
            height: 0;
        }

        100% {
            height: calc(var(--checkbox-height) / 2);
        }
    }

    @keyframes dothabottomcheck-19 {
        0% {
            height: 0;
        }

        100% {
            height: calc(var(--checkbox-height) / 2);
        }
    }

    @keyframes dothatopcheck-19 {
        0% {
            height: 0;
        }

        50% {
            height: 0;
        }

        100% {
            height: calc(var(--checkbox-height) * 1.2);
        }
    }

    @-webkit-keyframes dothatopcheck-19 {
        0% {
            height: 0;
        }

        50% {
            height: 0;
        }

        100% {
            height: calc(var(--checkbox-height) * 1.2);
        }
    }

    @-moz-keyframes dothatopcheck-19 {
        0% {
            height: 0;
        }

        50% {
            height: 0;
        }

        100% {
            height: calc(var(--checkbox-height) * 1.2);
        }
    }

    .checkbox-wrapper-19 input[type=checkbox] {
        display: none;
    }

    .checkbox-wrapper-19 .check-box {
        height: var(--checkbox-height);
        width: var(--checkbox-height);
        background-color: transparent;
        border: calc(var(--checkbox-height) * .1) solid #000;
        border-radius: 5px;
        position: relative;
        display: inline-block;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -moz-transition: border-color ease 0.2s;
        -o-transition: border-color ease 0.2s;
        -webkit-transition: border-color ease 0.2s;
        transition: border-color ease 0.2s;
        cursor: pointer;
    }

    .checkbox-wrapper-19 .check-box::before,
    .checkbox-wrapper-19 .check-box::after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: absolute;
        height: 0;
        width: calc(var(--checkbox-height) * .2);
        background-color: #34b93d;
        display: inline-block;
        -moz-transform-origin: left top;
        -ms-transform-origin: left top;
        -o-transform-origin: left top;
        -webkit-transform-origin: left top;
        transform-origin: left top;
        border-radius: 5px;
        content: " ";
        -webkit-transition: opacity ease 0.5;
        -moz-transition: opacity ease 0.5;
        transition: opacity ease 0.5;
    }

    .checkbox-wrapper-19 .check-box::before {
        top: calc(var(--checkbox-height) * .72);
        left: calc(var(--checkbox-height) * .41);
        box-shadow: 0 0 0 calc(var(--checkbox-height) * .05) var(--background-color);
        -moz-transform: rotate(-135deg);
        -ms-transform: rotate(-135deg);
        -o-transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }

    .checkbox-wrapper-19 .check-box::after {
        top: calc(var(--checkbox-height) * .37);
        left: calc(var(--checkbox-height) * .05);
        -moz-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .checkbox-wrapper-19 input[type=checkbox]:checked+.check-box,
    .checkbox-wrapper-19 .check-box.checked {
        border-color: #34b93d;
    }

    .checkbox-wrapper-19 input[type=checkbox]:checked+.check-box::after,
    .checkbox-wrapper-19 .check-box.checked::after {
        height: calc(var(--checkbox-height) / 2);
        -moz-animation: dothabottomcheck-19 0.2s ease 0s forwards;
        -o-animation: dothabottomcheck-19 0.2s ease 0s forwards;
        -webkit-animation: dothabottomcheck-19 0.2s ease 0s forwards;
        animation: dothabottomcheck-19 0.2s ease 0s forwards;
    }

    .checkbox-wrapper-19 input[type=checkbox]:checked+.check-box::before,
    .checkbox-wrapper-19 .check-box.checked::before {
        height: calc(var(--checkbox-height) * 1.2);
        -moz-animation: dothatopcheck-19 0.4s ease 0s forwards;
        -o-animation: dothatopcheck-19 0.4s ease 0s forwards;
        -webkit-animation: dothatopcheck-19 0.4s ease 0s forwards;
        animation: dothatopcheck-19 0.4s ease 0s forwards;
    }
</style>

<div class="pay-payhd-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['/pay-payhd/emp-detail-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkbox-wrapper-19">
                    <input id="desigName" type="checkbox" onchange="setHiddenValue('desigName');" />Designation
                    <label class="check-box" for="desigName"></label>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkbox-wrapper-19">
                    <input id="empDtBirth" type="checkbox" onchange="setHiddenValue('empDtBirth');" />Date Of Birth
                    <label class="check-box" for="empDtBirth"></label>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkbox-wrapper-19">
                    <input id="empDtAppt" type="checkbox" onchange="setHiddenValue('empDtAppt');" />Date Joined
                    <label class="check-box" for="empDtAppt"></label>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkbox-wrapper-19">
                    <input id="empBasic" type="checkbox" onchange="setHiddenValue('empBasic');" />Basic Salary
                    <label class="check-box" for="empBasic"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkbox-wrapper-19">
                    <input id="deptName" type="checkbox" onchange="setHiddenValue('deptName');" />Department
                    <label class="check-box" for="deptName"></label>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkbox-wrapper-19">
                    <input id="empDtRetir" type="checkbox" onchange="setHiddenValue('empDtRetir');" />Retirement Date
                    <label class="check-box" for="empDtRetir"></label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center;">
                <?= Html::submitButton('Preview', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-payhd/emp-detail-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
                <input type="hidden" name="chkdesigName" value="<?= (isset($_REQUEST['chkdesigName']) && !empty($_REQUEST['chkdesigName'])) ? $_REQUEST['chkdesigName'] : '0'; ?>" />
                <input type="hidden" name="chkempDtBirth" value="<?= (isset($_REQUEST['chkempDtBirth']) && !empty($_REQUEST['chkempDtBirth'])) ? $_REQUEST['chkempDtBirth'] : '0'; ?>" />
                <input type="hidden" name="chkempDtAppt" value="<?= (isset($_REQUEST['chkempDtAppt']) && !empty($_REQUEST['chkempDtAppt'])) ? $_REQUEST['chkempDtAppt'] : '0'; ?>" />
                <input type="hidden" name="chkempBasic" value="<?= (isset($_REQUEST['chkempBasic']) && !empty($_REQUEST['chkempBasic'])) ? $_REQUEST['chkempBasic'] : '0'; ?>" />
                <input type="hidden" name="chkdeptName" value="<?= (isset($_REQUEST['chkdeptName']) && !empty($_REQUEST['chkdeptName'])) ? $_REQUEST['chkdeptName'] : '0'; ?>" />
                <input type="hidden" name="chkempDtRetir" value="<?= (isset($_REQUEST['chkempDtRetir']) && !empty($_REQUEST['chkempDtRetir'])) ? $_REQUEST['chkempDtRetir'] : '0'; ?>" />
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr>

<script>
    setCheckedBoxes();

    function setHiddenValue(inputName) {
        if ($('#' + inputName + ':checked').length > 0) {
            $("input[name=chk" + inputName + "]").val('1');
        } else {
            $("input[name=chk" + inputName + "]").val('0');
        }
    }

    function setCheckedBoxes() {
        $("#desigName").prop('checked', false);
        $("#empDtBirth").prop('checked', false);
        $("#empDtAppt").prop('checked', false);
        $("#empBasic").prop('checked', false);
        $("#deptName").prop('checked', false);
        $("#empDtRetir").prop('checked', false);

        if ($("input[name=chkdesigName]").val() == '1') {
            $("#desigName").prop('checked', true);
        }
        if ($("input[name=chkempDtBirth]").val() == '1') {
            $("#empDtBirth").prop('checked', true);
        }
        if ($("input[name=chkempDtAppt]").val() == '1') {
            $("#empDtAppt").prop('checked', true);
        }
        if ($("input[name=chkempBasic]").val() == '1') {
            $("#empBasic").prop('checked', true);
        }
        if ($("input[name=chkdeptName]").val() == '1') {
            $("#deptName").prop('checked', true);
        }
        if ($("input[name=chkempDtRetir]").val() == '1') {
            $("#empDtRetir").prop('checked', true);
        }
    }
</script>