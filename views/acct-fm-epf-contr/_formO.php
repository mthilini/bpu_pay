<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctFmEpfContr $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-fm-epf-contr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfYear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfBalStart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfJan10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfJan15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfFeb10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfFeb15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfMar10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfMar15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfApr10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfApr15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfMay10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfMay15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfJun10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfJun15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfJul10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfJul15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfAug10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfAug15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfSep10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfSep15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfOct10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfOct15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfNov10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfNov15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfDec10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfDec15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfIntrRate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfInterest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epfBalEnd')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
