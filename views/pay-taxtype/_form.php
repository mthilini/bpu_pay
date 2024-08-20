<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayTaxtype $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-taxtype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'taxCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
