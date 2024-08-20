<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFundsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-fm-funds-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fundCode') ?>

    <?= $form->field($model, 'fundName') ?>

    <?= $form->field($model, 'fundBankType') ?>

    <?= $form->field($model, 'fundBankCode') ?>

    <?php // echo $form->field($model, 'fundBankAcct') ?>

    <?php // echo $form->field($model, 'fundLedg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
