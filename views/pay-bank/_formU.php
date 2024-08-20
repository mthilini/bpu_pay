<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayBank $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-bank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bankBank')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'bankName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bankAddr')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
