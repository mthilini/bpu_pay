<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayhdSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-payhd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'action' => ['/pay-payhd/employee-detail-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3">
                <label>UPF No.</label>
                <select name="upfNo" id="upfNo" class="form-control">
                    <option></option>
                    <?php
                    $upfNos = $upfList->getModels();
                    if ($upfNos != null) {
                        foreach ($upfNos as $key => $upfNo) {
                    ?>
                            <option value="<?= $upfNo['empUPFNo']; ?>" <?= (!empty($request['upfNo']) && $request['upfNo'] == $upfNo['empUPFNo']) ? 'selected="selected"' : '' ?>><?= $upfNo['empUPFNo']; ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-4">
                <?= Html::submitButton('Preview', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-payhd/employee-detail-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
                <?= (isset($request['upfNo']) && !empty($request['upfNo'])) ?
                    '<a type="btn" class="btn btn-warning btn-sm" onclick="return printEmployeeDetailReport(' . $request['upfNo'] . ');">Print</a>' : '';
                ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr>

<script>
    function printEmployeeDetailReport(upfNo) {
        $("#ifrm").get(0).contentWindow.print();
    }
</script>