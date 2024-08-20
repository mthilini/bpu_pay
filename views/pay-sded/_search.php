<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PaySdedSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-sded-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'sdedRef') ?>

    <?= $form->field($model, 'sdedFld') ?>

    <?= $form->field($model, 'sdedStart') ?>

    <?php // echo $form->field($model, 'sdedEnd') ?>

    <?php // echo $form->field($model, 'sdedAmt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
