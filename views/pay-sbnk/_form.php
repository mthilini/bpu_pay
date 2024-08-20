<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayBank;
use  \yii\jui\Model;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-sbnk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sbnkRef')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sbnkStart')->textInput() ?>
    <?= $form->field($model, 'sbnkEnd')->textInput() ?>

    <?= $form->field($model, 'sbnkAmt')->textInput() ?>

<!--    <?= $form->field($model, 'sbnkBank')->textInput(['maxlength' => true]) ?> -->
<?php 
	//use app\models\AcctLedgmain;
    	$BankBank=PayBank::find()->orderBy('bankName ASC')->all();
    	//use yii\helpers\ArrayHelper;
    	$listData=ArrayHelper::map($BankBank,'bankBank','bankName');
    echo $form->field($model, 'sbnkBank')->dropDownList(
        $listData,
        ['prompt'=>'Select Bank...']
    );?>

    <?= $form->field($model, 'sbnkAcct')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sbnkAName')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'sbnkLoan')->textInput(['maxlength' => true]) ?> -->
<?= $form->field($model, 'sbnkLoan')->dropDownList(['1' => 'Yes', '0' => 'No']);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
