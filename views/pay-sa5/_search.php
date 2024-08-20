<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PaySa5Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-sa5-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'sa5Ref') ?>

    <?= $form->field($model, 'sa5Fld') ?>

    <?= $form->field($model, 'sa5Start') ?>

    <?php // echo $form->field($model, 'sa5End') ?>

    <?php // echo $form->field($model, 'sa5Amt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
