<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayFields;
/** @var yii\web\View $this */
/** @var app\models\PaySeml $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-seml-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semlRef')->textInput(['maxlength' => true]) ?>

 <!--   <?= $form->field($model, 'semlFld')->textInput(['maxlength' => true]) ?>-->
    <?php
    //use app\models\AcctLedgmain;
//use yii\helpers\ArrayHelper;
    $payFields = PayFields::find()->where(['fldType' => 0])->all();
    $listData=ArrayHelper::map($payFields,'fldCode','fldName');
    echo $form->field($model, 'semlFld')->dropDownList(
        $listData,
        ['prompt'=>'Select Pay Field...']
    );?>

    <?= $form->field($model, 'semlStart')->textInput() ?>

    <?= $form->field($model, 'semlEnd')->textInput() ?>

    <?= $form->field($model, 'semlAmt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
