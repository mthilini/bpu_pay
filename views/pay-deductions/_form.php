<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayDeductions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-deductions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dedMon')->textInput() ?>

    <?= $form->field($model, 'dedYear')->textInput() ?>

    <?= $form->field($model, 'dedDeduction')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
