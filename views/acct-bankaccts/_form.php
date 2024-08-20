<?php

use app\models\AcctLedger;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctBankaccts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-bankaccts-form">

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
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <?= $form->field($model, 'bactPayable1')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <?= $form->field($model, 'bactPayable2')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <?= $form->field($model, 'bactPayable3')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <?= $form->field($model, 'bactPayable4')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <?= $form->field($model, 'bactPayable5')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <?= $form->field($model, 'bactPayable6')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
