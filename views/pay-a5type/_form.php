<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayA5type $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-a5type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'a5Code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a5Desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
