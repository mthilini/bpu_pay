<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayFieldsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-fields-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fldCode') ?>

    <?= $form->field($model, 'fldName') ?>

    <?= $form->field($model, 'fldUPF')->checkbox() ?>

    <?= $form->field($model, 'fldETF')->checkbox() ?>

    <?php // echo $form->field($model, 'fldType') ?>

    <?php // echo $form->field($model, 'fldCat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
