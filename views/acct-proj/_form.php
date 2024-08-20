<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctProg;

/** @var yii\web\View $this */
/** @var app\models\AcctProj $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-proj-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    //use app\models\AcctProg;
    $program=AcctProg::find()->all();
    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($program,'progCode','progDesc');
    echo $form->field($model, 'progCode')->dropDownList(
        $listData,
        ['prompt'=>'Select Program...']
    );?>

    <?= $form->field($model, 'projCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
