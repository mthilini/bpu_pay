<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctFmEpfContr $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-fm-epf-contr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'epfYear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfBalStart')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
