<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctPaycashSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-paycash-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'payDate') ?>

    <?= $form->field($model, 'payVch') ?>

    <?= $form->field($model, 'paySub') ?>

    <?= $form->field($model, 'payType') ?>

    <?php // echo $form->field($model, 'payAmount') ?>

    <?php // echo $form->field($model, 'payRmks') ?>

    <?php // echo $form->field($model, 'payCashBk') ?>

    <?php // echo $form->field($model, 'payPayee') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
