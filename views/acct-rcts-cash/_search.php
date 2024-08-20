<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsCashSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-rcts-cash-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rctDate') ?>

    <?= $form->field($model, 'rctNo') ?>

    <?= $form->field($model, 'rctSub') ?>

    <?= $form->field($model, 'rctType') ?>

    <?php // echo $form->field($model, 'rctName') ?>

    <?php // echo $form->field($model, 'rctAmount') ?>

    <?php // echo $form->field($model, 'rctRmks') ?>

    <?php // echo $form->field($model, 'rctCashBk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
