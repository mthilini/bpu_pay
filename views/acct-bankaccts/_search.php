<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctBankacctsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-bankaccts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bactAcctCode') ?>

    <?= $form->field($model, 'bactBankCode') ?>

    <?= $form->field($model, 'bactBankName') ?>

    <?= $form->field($model, 'bactAcctNo') ?>

    <?php // echo $form->field($model, 'bactAcctName') ?>

    <?php // echo $form->field($model, 'bactVoucher') ?>

    <?php // echo $form->field($model, 'bactReceipt') ?>

    <?php // echo $form->field($model, 'bactJournal') ?>

    <?php // echo $form->field($model, 'bactCBkLedg') ?>

    <?php // echo $form->field($model, 'bactPayable1') ?>

    <?php // echo $form->field($model, 'bactPayable2') ?>

    <?php // echo $form->field($model, 'bactPayable3') ?>

    <?php // echo $form->field($model, 'bactPayable4') ?>

    <?php // echo $form->field($model, 'bactPayable5') ?>

    <?php // echo $form->field($model, 'bactPayable6') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
