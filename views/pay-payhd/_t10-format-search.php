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
        'action' => ['/pay-payhd/t10-format-report'],
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
                <?= Html::a('Reset', ['/pay-payhd/t10-format-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
                <?= (isset($request['upfNo']) && !empty($request['upfNo'])) ?
                    '<a type="btn" class="btn btn-warning btn-sm" onclick="return printT10TaxForm(' . $request['upfNo'] . ');">Print</a>' : '';
                ?>
                <?= (isset($request['upfNo']) && !empty($request['upfNo'])) ?
                    '<a type="btn" class="btn btn-warning btn-sm" onclick="return exportT10TaxForm();"><i class="fas fa-file-excel" title="Excel"></i></a>' : '';
                ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr>

<script>
    function printT10TaxForm(upfNo) {
        $("#ifrm").get(0).contentWindow.print();
    }

    function exportT10TaxForm() {
        var upfNo = $('#upfNo').val();
        window.open('t10-format-pdf?excel=true&upfNo=' + upfNo);

    }
</script>