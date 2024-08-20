<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PaySemlSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-seml-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'semlRef') ?>

    <?= $form->field($model, 'semlFld') ?>

    <?= $form->field($model, 'semlStart') ?>

    <?php // echo $form->field($model, 'semlEnd') ?>

    <?php // echo $form->field($model, 'semlAmt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
