<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayIncome $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-income-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'incMon')->textInput() ?>

    <?= $form->field($model, 'incYear')->textInput() ?>

    <?= $form->field($model, 'incIncome')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
