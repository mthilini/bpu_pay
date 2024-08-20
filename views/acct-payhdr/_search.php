<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctPayhdrSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-payhdr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'payDate') ?>

    <?= $form->field($model, 'payVch') ?>

    <?= $form->field($model, 'payCashBk') ?>

    <?= $form->field($model, 'payPrepared') ?>

    <?php // echo $form->field($model, 'payDatePrepare') ?>

    <?php // echo $form->field($model, 'payCertify') ?>

    <?php // echo $form->field($model, 'payDateCertify') ?>

    <?php // echo $form->field($model, 'payAuthorise') ?>

    <?php // echo $form->field($model, 'payDateAuthorise') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
