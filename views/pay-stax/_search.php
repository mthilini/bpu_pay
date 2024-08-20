<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayStaxSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-stax-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'staxRef') ?>

    <?= $form->field($model, 'staxFld') ?>

    <?= $form->field($model, 'staxStart') ?>

    <?php // echo $form->field($model, 'staxEnd') ?>

    <?php // echo $form->field($model, 'staxAmt') ?>

    <?php // echo $form->field($model, 'staxIncome') ?>

    <?php // echo $form->field($model, 'staxMoney') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
