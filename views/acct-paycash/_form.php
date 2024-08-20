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

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model_cash, 'payCashBk')->dropDownList(
                ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctName')->all(), 'bactAcctCode', 'bactAcctName'),
                ['prompt' => 'Select Cashbook']
            ) ?>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <?= $form->field($model_cash, 'payVch')->textInput() ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model_cash, 'payDate')->textInput() ?>
        </div>
    </div>



    <div class="row">
        <div class="col-md-8">
            <!--cash or ledger-->
            <div class="row d-flex align-items-center justify-content-start">
                <div class="col-4 offset-1">
                    <input type="radio" id="col" name="col" />
                    <label for="c">Cash</label>
                </div>
                <div class="col-4">
                    <input type="radio" id="col" name="col" />
                    <label for="l">Ledger</label>
                </div>
                <div class="col-3">
                    <?= $form->field($model_cash, 'paySub')->textInput(['maxlength' => true,]) ?>
                </div>
            </div>
            <!--cash items1-->
            <div id="cash_items_payment1" hidden>
                <div class="form-group">
                    <div class="row d-flex align-items-center justify-content-start">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-6">
                                    <input type="radio" id="chodb" name="chodb" />
                                    <label for="c">Cheque</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" id="chodb" name="chodb" />
                                    <label for="c">Direct Debit</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-8">

                                    <label>Cheque No.</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="col-4 d-flex align-items-end justify-content-start">
                                    <button type="button" class="btn btn-sm btn-secondary">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model_cash, 'payType')->dropDownList(
                            ['Cheque' => 'Cheque', 'Cash' => 'Cash', 'Direct Debit' => 'Direct Debit'],
                            ['prompt' => 'Select Cashbook']
                        ) ?>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <?= $form->field($model_cash, 'payPayee')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <?= $form->field($model_cash, 'payAmount')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-7">
                        <?= $form->field($model_cash, 'payRmks')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-2 d-flex align-items-end justify-content-start">
                        <?= Html::Button('Add', ['class' => 'btn btn-sm btn-success']) ?>
                    </div>
                </div>
            </div>

            <!--ledger items-->
            <div id="ledger_items1">
                <div class="form-group">
                    <div class="row d-flex align-items-center justify-content-start">
                        <div class="col-md-6">
                            <!--ledger vote-->
                            <div class="row">
                                <div class="col-6">
                                    <input type="radio" id="lov" name="lov" />
                                    <label for="c">Ledger</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" id="lov" name="lov" />
                                    <label for="c">Vote</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                    <div id="ledger_row" class="row">
                    
                    </div>
                    <div id="vote_row" class="row">
                        
                    </div>

                    <!--amount remarks add-->
                    <div class="row">
                        <div class="col-3">
                            <?= $form->field($model_cash, 'payAmount')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-7">
                            <?= $form->field($model_cash, 'payRmks')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-2 d-flex align-items-end justify-content-start">
                            <?= Html::Button('Add', ['class' => 'btn btn-sm btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--cash items2-->
        <div id="cash items2" class="col-md-4">
            <label>WIthhel Amounts</label>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Default Ledger</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Default Ledger</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Default Ledger</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Default Ledger</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Default Ledger</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
            </div>
            <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Default Ledger</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" />
            </div>
        </div>
    </div>

    <br />



    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <label>Cash</label>
                    <div class="row p-2">
                        <div class="col" style="height: 20vh; overflow: scroll;">
                            <table id="table_cash1" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fas fa-times-circle" onclick="deleteRow('table_cash1');" style="color:red;"></i>
                                        </th>
                                        <th>Sub</th>
                                        <th>Payee</th>
                                        <th>Cheque</th>
                                        <th>Amount</th>
                                        <th>Deduct</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td>sdfs</td>
                                        <td>sdfgsdfsd</td>
                                        <td></td>
                                        <td>sfsdf</td>
                                        <td>sdgsdfg</td>
                                        <td>sdgfsdgs</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td>sdgs</td>
                                        <td></td>
                                        <td>sdgsd</td>
                                        <td></td>
                                        <td>chdrgh</td>
                                        <td>retyeruerdtc reus5</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row  p-2">
                        <div class="col" style="height: 15vh; overflow: scroll;">
                            <table id="table_cahs2" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fas fa-times-circle" onclick="deleteRow('table_cahs2');" style="color:red;"></i>
                                        </th>
                                        <th>Sub</th>
                                        <th>Ledger</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <label>Ledger</label>
                    <div class="row p-2">
                        <div class="col" style="height: 37vh; overflow: scroll;">
                            <table id="table_ledger" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            <i class="fas fa-times-circle" onclick="deleteRow('table_ledger');" style="color:red;"></i>
                                        </th>
                                        <th>Sub</th>
                                        <th>Ledger</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td>sdfs</td>
                                        <td>sdfgsdfsd</td>
                                        <td>sfsdf</td>
                                        <td>sdgsdfg</td>
                                        <td>sdgfsdgs</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td>sdgs</td>
                                        <td>sdgsd</td>
                                        <td></td>
                                        <td>chdrgh</td>
                                        <td>retyeruerdtc reus5</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="chk" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br />

            <!--bottom line-->
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-3 offset-1">
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-1 d-flex align-items-center justify-content-center">
                            <i class="fas fa-equals"></i>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-3 offset-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
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