<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgmain $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-ledgmain-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mainCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mainDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
