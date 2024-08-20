<?php

use app\models\AcctLedger;
use app\models\PayBank;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFunds $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-fm-funds-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fundName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fundBankType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fundBankCode')->dropDownList(
            ArrayHelper::map(PayBank::find()->orderBy('bankName')->all(),'bankBank','bankName'),
            ['prompt'=>'Select Bank Name']
    ) ?>

    <?= $form->field($model, 'fundBankAcct')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fundLedg')->dropDownList(
            ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(),'ledgCode','ledgDesc'),
            ['prompt'=>'Select Ledger Code']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
