<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayFmEpfContrSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-fm-epf-contr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'empUPFNo') ?>

    <?= $form->field($model, 'epfYear') ?>

    <?= $form->field($model, 'epfBalStart') ?>

    <?= $form->field($model, 'epfJan10') ?>

    <?php // echo $form->field($model, 'epfJan15') ?>

    <?php // echo $form->field($model, 'epfFeb10') ?>

    <?php // echo $form->field($model, 'epfFeb15') ?>

    <?php // echo $form->field($model, 'epfMar10') ?>

    <?php // echo $form->field($model, 'epfMar15') ?>

    <?php // echo $form->field($model, 'epfApr10') ?>

    <?php // echo $form->field($model, 'epfApr15') ?>

    <?php // echo $form->field($model, 'epfMay10') ?>

    <?php // echo $form->field($model, 'epfMay15') ?>

    <?php // echo $form->field($model, 'epfJun10') ?>

    <?php // echo $form->field($model, 'epfJun15') ?>

    <?php // echo $form->field($model, 'epfJul10') ?>

    <?php // echo $form->field($model, 'epfJul15') ?>

    <?php // echo $form->field($model, 'epfAug10') ?>

    <?php // echo $form->field($model, 'epfAug15') ?>

    <?php // echo $form->field($model, 'epfSep10') ?>

    <?php // echo $form->field($model, 'epfSep15') ?>

    <?php // echo $form->field($model, 'epfOct10') ?>

    <?php // echo $form->field($model, 'epfOct15') ?>

    <?php // echo $form->field($model, 'epfNov10') ?>

    <?php // echo $form->field($model, 'epfNov15') ?>

    <?php // echo $form->field($model, 'epfDec10') ?>

    <?php // echo $form->field($model, 'epfDec15') ?>

    <?php // echo $form->field($model, 'epfIntrRate') ?>

    <?php // echo $form->field($model, 'epfInterest') ?>

    <?php // echo $form->field($model, 'epfBalEnd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
