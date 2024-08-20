<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctLedgmain;

/** @var yii\web\View $this */
/** @var app\models\AcctLedger $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-ledger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    //use app\models\AcctLedgmain;
    $mainLedgers=AcctLedgmain::find()->all();
    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($mainLedgers,'mainCode','mainDesc');
    echo $form->field($model, 'mainCode')->dropDownList(
        $listData,
        ['prompt'=>'Select Main Ledger Code...']
    );?>
    <?= $form->field($model, 'ledgSub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ledgCode')->textInput(['maxlength' => true,'placeholder' => 'Generate Automatically based above', 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'ledgDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
