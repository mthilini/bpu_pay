<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctProg $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-prog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'progCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'progDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
