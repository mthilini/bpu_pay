<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayFieldType;
//
/** @var yii\web\View $this */
/** @var app\models\PayFields $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fldCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fldName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fldUPF')->checkbox() ?>

    <?= $form->field($model, 'fldETF')->checkbox() ?>

<?php
	//use app\models\AcctLedgmain;
    	$payFieldTypes=PayFieldType::find()->all();
    	//use yii\helpers\ArrayHelper;
    	$listData=ArrayHelper::map($payFieldTypes,'typeCode','typeName');
    	echo $form->field($model, 'fldType')->dropDownList(
        $listData,
        ['prompt'=>'Select Field Type...']
    );?>

    <?= $form->field($model, 'fldCat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
