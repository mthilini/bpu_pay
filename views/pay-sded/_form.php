<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayFields;

/** @var yii\web\View $this */
/** @var app\models\PaySded $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-sded-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sdedRef')->textInput(['maxlength' => true]) ?>

<?php
    //use app\models\AcctLedgmain;
//use yii\helpers\ArrayHelper;
    $payFields = PayFields::find()->where(['or', ['fldType' => 1], ['fldType' => 4]])->all();
    $listData=ArrayHelper::map($payFields,'fldCode','fldName');
    echo $form->field($model, 'sdedFld')->dropDownList(
        $listData,
        ['prompt'=>'Select Pay Field...']
    );?>
    <?= $form->field($model, 'sdedStart')->textInput() ?>

    <?= $form->field($model, 'sdedEnd')->textInput() ?>

    <?= $form->field($model, 'sdedAmt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
