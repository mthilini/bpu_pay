<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayBankSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-bank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bankCode') ?>

    <?= $form->field($model, 'bankBranch') ?>

    <?= $form->field($model, 'bankBank') ?>

    <?= $form->field($model, 'bankName') ?>

    <?php // echo $form->field($model, 'bankAddr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
