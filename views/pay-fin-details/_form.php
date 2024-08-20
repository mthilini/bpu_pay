<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayBank;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetails $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-fin-details-form">

    <?php $form = ActiveForm::begin(); ?>

 <!--   <?//= $form->field($model, 'nic')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'title')->textInput(['maxlength' => true]) ?> 

    <?//= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'initials')->textInput(['maxlength' => true]) ?>
-->
    <?= $form->field($model, 'epfNo')->textInput(['maxlength' => true]) ?>

 <!--   <?= $form->field($model, 'medicalFundContributor')->textInput() ?> -->
    <?= $form->field($model, 'medicalFundContributor')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']);
?>

<!--    <?= $form->field($model, 'salaryBankCode')->textInput(['maxlength' => true]) ?> -->
<?php
        //use app\models\AcctLedgmain;
        $BankBank=PayBank::find()->orderBy('bankName ASC')->all();
        //use yii\helpers\ArrayHelper;
        $listData=ArrayHelper::map($BankBank,'bankBank','bankName');
    echo $form->field($model, 'salaryBankCode')->dropDownList(
        $listData,
        ['prompt'=>'Select Bank...']
    );?>


    <?= $form->field($model, 'bankAccountNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bankAccountName')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'taxConsent')->textInput() ?> -->
    <?= $form->field($model, 'taxConsent')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']);
?>

    <?= $form->field($model, 'applicableTaxTable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bankLoanAmount')->textInput(['value' => '000','maxlength' => true]);  ?>

    <?= $form->field($model, 'bankLoanReleaseDate')->textInput(['value' => '1900-01-01']);  ?>

    <?= $form->field($model, 'otherInfo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
