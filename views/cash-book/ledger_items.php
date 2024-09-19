<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\AcctLedger;
use app\models\AcctLedgmain;
use app\models\AcctVotes;
use app\models\PayDept;

?>

<div id="ledger_items">
    <div class="form-group">
        <div class="row d-flex align-items-center justify-content-start">
            <div class="col-sm-6">
                <!--ledger vote-->
                <div class="row">
                    <div class="col-6">
                        <input type="radio" id="l_ledger" name="lov" onclick="chlov('l_ledger');" />
                        <label for="c">Ledger</label>
                    </div>
                    <div class="col-6">
                        <input type="radio" id="l_vote" name="lov" onclick="chlov('l_vote');" />
                        <label for="c">Vote</label>
                    </div>
                </div>
            </div>
        </div>

        <div id="ledger_row" class="row">
            <div id="s_main_ledger" class="col-4">
                <label>Main Ledger</label>
                <select id="select_main_ledger" class="form-control" onchange="ledgeroption(this.value);">
                    <option value="" selected>Select a Main Ledger</option>
                    <?php foreach (AcctLedgmain::find()->orderBy('mainDesc')->all() as $option) { ?>
                        <option value=<?= $option->mainCode ?>><?= $option->mainDesc ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="s_ledger" class="col-5">
                <label>Ledger</label>
                <select id="select_ledger" class="form-control" onchange="ledgercode(this.value); setledger(this.value);">
                    <option value="" selected disabled>Select a Ledger</option>
                    <?php foreach (AcctLedger::find()->orderBy('ledgDesc')->all() as $option) { ?>
                        <option value=<?= $option->ledgCode ?>><?= $option->ledgDesc ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="s_vote" class="col-9">
                <label>Vote</label>
                <select id="select_vote" class="form-control" onchange="votecode(this.value);">
                    <option value="" selected disabled>Select a Vote</option>
                    <?php foreach (AcctVotes::find()->orderBy('voteDesc')->all() as $vote) { ?>
                        <option value=<?= $vote->voteVote ?>><?= $vote->voteVote ?> - <?= $vote->voteDesc ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-3">
                <label>Ledger/Vote Code</label>
                <input id="lv_code" type="text" class="form-control" />
            </div>
        </div>
        <div id="vote_row" class="row"></div>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model_ledger, 'payCat')->dropDownList(
                    //ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctName')->all(), 'bactAcctCode', 'bactAcctName'),
                    ['prompt' => 'Select Category']
                ) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model_ledger, 'payDept')->dropDownList(
                    ArrayHelper::map(PayDept::find()->orderBy('deptName')->all(), 'deptCode', 'deptName'),
                    [
                        'required' => true,
                        'prompt' => [
                            'text' => 'Select a Department',
                            'options' => ['disabled' => true, 'selected' => true]
                        ]
                    ]
                ) ?>
            </div>
        </div>

        <?= $this->render('amount_ledger', [
            'form' => $form,
            'model_ledger' => $model_ledger
        ]) ?>

    </div>
</div>

<script>
    /* set the ledger/vote code */
    function ledgercode(value) {
        document.getElementById('lv_code').value = value;
    }

    function votecode(value) {
        document.getElementById('lv_code').value = value;
    }

    /* set the ledger options */
    function ledgeroption(value) {
        var sdata = {
            main_ledger: value,
            otherinfo: {
                user: "user name",
            }
        };

        //console.log(JSON.stringify(sdata));

        select = document.getElementById('select_ledger');
        remove_options(select);


        $.ajax({
            url: "ledgers",
            type: "POST",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            traditional: false,
            data: JSON.stringify(sdata),
            success: function (response) {
                if (response.status === "OK") {
                    // do something with response.message or whatever other data on success
                    //console.log(response.status);
                    /*set options */
                    for (const [key, value] of Object.entries(response.data)) {
                        var option = document.createElement('option');
                        option.value = key;
                        option.innerHTML = value;
                        select.appendChild(option);
                    }

                } else if (response.status) {
                    // do something with response.message or whatever other data on error
                    console.log(response.status);
                    //alert(response.status);
                }
                else {
                    console.log(response);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function remove_options(select_element) {
        length = select_element.options.length;
        for (i = 1; i < length; i++) {
            select_element.remove(1);
        }

        /* initiate to default */
        select_element.selectedIndex = 0;
        clearlvcode();
    }

    function clearlvcode() {
        document.getElementById('lv_code').value = null;
    }

    function chlov(value) {
        clearlvcode();
        switch (value) {
            case "l_ledger":
                document.getElementById("s_vote").style.display = 'none';
                document.getElementById("s_main_ledger").style.display = 'block';
                document.getElementById("s_ledger").style.display = 'block';
                break;
            case "l_vote":
                document.getElementById("s_main_ledger").style.display = 'none';
                document.getElementById("s_ledger").style.display = 'none';
                document.getElementById("s_vote").style.display = 'block';
                break;
        }
    }

    function setledger(value) {
        var sdata = {
            ledger: value,
            otherinfo: {
                user: "user name",
            }
        };

        $.ajax({
            url: "mainledger",
            type: "POST",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            traditional: true,
            data: JSON.stringify(sdata),
            success: function (response) {
                if (response.status === "OK") {
                    // do something with response.message or whatever other data on success

                    /*select main ledger options */
                    for (const [key, value] of Object.entries(response.data)) {
                        document.getElementById('select_main_ledger').value = key;
                    }

                } else if (response.status) {
                    // do something with response.message or whatever other data on error
                    console.log(response.status);
                    //alert(response.status);
                }
                else {
                    console.log(response);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });

        //console.log(value);
    }
</script>