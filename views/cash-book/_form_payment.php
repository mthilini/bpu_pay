<?php

use app\models\AcctBankaccts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\AcctPaycash $model_cash */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-paycash-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--header-->
    <?= $this->render('header_pay', [
        'form' => $form,
        'model_cash' => $model_cash,
        //'model_ledger' => $model_ledger,
    ]) ?>


    <div class="row">
        <div class="col-md-8">
            <!--cash or ledger-->
            <!--header sub-->
            <?= $this->render('header_sub_pay', [
                'form' => $form,
                'model_cash' => $model_cash,
                //'model_ledger' => $model_ledger,
            ]) ?>

            <!--cash items-->
            <?= $this->render('cash_items_payment1', [
                'form' => $form,
                'model_cash' => $model_cash,
            ]) ?>

            <!--ledger items-->
            <?= $this->render('ledger_items_pay', [
                'form' => $form,
                'model_ledger' => $model_ledger,
            ]) ?>
        </div>
        <!--cash items2-->
        <?= $this->render('cash_items_payment2', [
            'form' => $form,
            'model_cash' => $model_cash,
        ]) ?>

    </div>

    <br />

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <!--table_cash-->
                    <label>Cash</label>
                    <div class="row p-2">
                        <div class="col" style="height: 20vh; overflow: scroll;">
                            <?= $this->render('table_cash') ?>
                        </div>
                    </div>
                    <!--table_cash sub-->
                    <div class="row  p-2">
                        <div class="col" style="height: 15vh; overflow: scroll;">
                            <?= $this->render('table_cash_sub') ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!--table_ledger-->
                    <label>Ledger</label>
                    <div class="row p-2">
                        <div class="col" style="height: 37vh; overflow: scroll;">
                            <?= $this->render('table_ledger') ?>
                        </div>
                    </div>
                </div>
            </div>
            <br />

            <!--bottom line-->
            <?= $this->render('bottom_line') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-3 d-flex align-items-center justify-content-center"><button type="button" class="btn btn-sm btn-primary">Accept</button></div>
        <div class="col-3 d-flex align-items-center justify-content-center"><button type="button" class="btn btn-sm btn-success">Save</button></div>
        <div class="col-3 d-flex align-items-center justify-content-center"><button type="button" class="btn btn-sm btn-warning">Cancel</button></div>
        <div class="col-3 d-flex align-items-center justify-content-center"><button type="button" class="btn btn-sm btn-danger">Close</button></div>
    </div>

    <!--
    = Html::label('Pay Type', '') 
    = Html::textInput('Mode', '', ['class' => 'form-control']) 
    -->



    <div class="form-group"></div>

    <?php ActiveForm::end(); ?>

</div>


<script>
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if (null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }


            }
        } catch (e) {
            alert(e);
        }
    }
</script>

<script>
    /* documetn ready */
    $(document).ready(function () {
        document.getElementById('ledger').checked = true;
        document.getElementById('l_ledger').checked = true;
        chcol('ledger');
        chlov('l_ledger');
    });
</script>

<script>
    function chcol(value) {
        switch (value) {
            case "cash":
                document.getElementById("ledger_items").style.display = 'none';
                document.getElementById("cash_items_payment1").style.display = 'block';
                document.getElementById("cash_items_payment2").style.display = 'block';
                break;
            case "ledger":
                document.getElementById("cash_items_payment1").style.display = 'none';
                document.getElementById("cash_items_payment2").style.display = 'none';
                document.getElementById("ledger_items").style.display = 'block';
                break;
        }
    }
</script>