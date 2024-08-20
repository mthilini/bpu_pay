<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PaySbnkSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-sbnk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'sbnkRef') ?>

    <?= $form->field($model, 'sbnkStart') ?>

    <?= $form->field($model, 'sbnkEnd') ?>

    <?php // echo $form->field($model, 'sbnkAmt') ?>

    <?php // echo $form->field($model, 'sbnkBank') ?>

    <?php // echo $form->field($model, 'sbnkAcct') ?>

    <?php // echo $form->field($model, 'sbnkAName') ?>

    <?php // echo $form->field($model, 'sbnkLoan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
