<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgsub $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-ledgsub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lsubCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lsubDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
