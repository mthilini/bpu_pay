<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledgSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-payledg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'payDate') ?>

    <?= $form->field($model, 'payVch') ?>

    <?= $form->field($model, 'paySub') ?>

    <?= $form->field($model, 'payLedg') ?>

    <?php // echo $form->field($model, 'payAmount') ?>

    <?php // echo $form->field($model, 'payRmks') ?>

    <?php // echo $form->field($model, 'payCashBk') ?>

    <?php // echo $form->field($model, 'payDept') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
