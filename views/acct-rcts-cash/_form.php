<?php

use app\models\AcctBankaccts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsCash $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-rcts-cash-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rctCashBk')->dropDownList(
                ArrayHelper::map(AcctBankaccts::find()->orderBy('bactAcctName')->all(),'bactAcctCode','bactAcctName'),
                ['prompt'=>'Select Cashbook']
       ) ?>

<!--    <?= $form->field($model, 'rctDate')->textInput() ?> -->
	<label for="<?= $model->formName() ?>-rctDate">Receipt Date</label>
    <?= $form->field($model, 'rctDate')->label(false)->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'dd/MM/yyyy',
	]) ?>

    <?= $form->field($model, 'rctNo')->textInput() ?>

    <?= $form->field($model, 'rctSub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rctName')->textInput(['maxlength' => true]) ?>

    <?= Html::label('Receipt Type', '') ?>
    <br>
    <?= Html::dropDownList('mode', 'Cheque', ['Cheque' => 'Cheque', 'Cash' => 'Cash', 'Direct Debit' => 'Direct Debit'],
        [//'prompt'=>'-Choose a option-',
                'onchange'=>'if($(this).val() != "Cheque"){
                var selectedValue = $(this).find(":selected").val();
                $("#rctType").val(selectedValue).prop("readonly", true);
         } else {
                var selectedValue ="";
                $("#rctType").val(selectedValue).prop("readonly", false);
        }'
        ]) ?> 
    <?= $form->field($model, 'rctType')->textInput(['maxlength' => true,'id'=>'rctType']) ?>

    <?= $form->field($model, 'rctAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rctRmks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
