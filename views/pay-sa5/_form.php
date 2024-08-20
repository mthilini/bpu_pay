<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PayA5type;  //A5Type Drop-down list
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\PaySa5 $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-sa5-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sa5Ref')->textInput(['maxlength' => true]) ?>

<!--    <?= $form->field($model, 'sa5Fld')->textInput(['maxlength' => true]) ?> -->
<?php
    $a5types=PayA5type::find()->all();
    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($a5types,'a5Code','a5Desc');
    echo $form->field($model, 'sa5Fld')->dropDownList(
        $listData,
        ['prompt'=>'Select A5 Code...']
    );?>

    <?= $form->field($model, 'sa5Start')->textInput() ?>

    <?= $form->field($model, 'sa5End')->textInput() ?>

    <?= $form->field($model, 'sa5Amt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
