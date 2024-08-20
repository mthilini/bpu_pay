<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayDeductionsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-deductions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'dedMon') ?>

    <?= $form->field($model, 'dedYear') ?>

    <?= $form->field($model, 'dedDeduction') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
