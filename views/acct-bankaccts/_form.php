<?php

use app\models\AcctLedger;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctBankaccts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-bankaccts-form">
        <div class="col-md-6 col-lg-5 col-xl-5">
                <table width="100%" xmlns="http://www.w3.org/1999/html">
                        <tr>
                                <td valign="top">
                                        <div class="box box-primary">
                                                <div class="box-body">
                                                        <div class="panel-body">
                                                                <div class="user-view">
                                                                        <?php $form = ActiveForm::begin(); ?>

                                                                        <?= $form->field($model, 'bactAcctCode')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                                                                        <?= $form->field($model, 'bactBankCode')->textInput(['maxlength' => true]) ?>

                                                                        <?= $form->field($model, 'bactBankName')->textInput(['maxlength' => true]) ?>

                                                                        <?= $form->field($model, 'bactAcctNo')->textInput(['maxlength' => true]) ?>

                                                                        <?= $form->field($model, 'bactAcctName')->textInput(['maxlength' => true]) ?>

                                                                        <?= $form->field($model, 'bactVoucher')->textInput() ?>

                                                                        <?= $form->field($model, 'bactReceipt')->textInput() ?>

                                                                        <?= $form->field($model, 'bactJournal')->textInput() ?>

                                                                        <?= $form->field($model, 'bactCBkLedg')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <?= $form->field($model, 'bactPayable1')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <?= $form->field($model, 'bactPayable2')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <?= $form->field($model, 'bactPayable3')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <?= $form->field($model, 'bactPayable4')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <?= $form->field($model, 'bactPayable5')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <?= $form->field($model, 'bactPayable6')->dropDownList(
                                                                                ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                                                                ['prompt' => 'Select Ledger Code']
                                                                        ) ?>

                                                                        <p>
                                                                                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                                                                <?= Html::a('Close', ['/acct-bankaccts/index'], ['class' => 'btn btn-default pull-right']) ?>
                                                                        </p>
                                                                        <?php ActiveForm::end(); ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </td>
                        </tr>
                </table>
        </div>

</div>