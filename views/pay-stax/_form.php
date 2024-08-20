<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayTaxtype;
/** @var yii\web\View $this */
/** @var app\models\PayStax $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-stax-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staxRef')->textInput(['maxlength' => true]) ?>

<!--    <?//= $form->field($model, 'staxFld')->textInput(['maxlength' => true]) ?> -->
<?php
    //use app\models\AcctLedgmain;
    $paytaxtypes=PayTaxtype::find()->all();
    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($paytaxtypes,'taxCode','taxDesc');
    echo $form->field($model, 'staxFld')->dropDownList(
        $listData,
        ['prompt'=>'Select tax Code...']
    );?>

    <?= $form->field($model, 'staxStart')->textInput() ?>

    <?= $form->field($model, 'staxEnd')->textInput() ?>

    <?= $form->field($model, 'staxAmt')->textInput() ?>

    <?= $form->field($model, 'staxIncome')->textInput() ?>

    <?= $form->field($model, 'staxMoney')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
