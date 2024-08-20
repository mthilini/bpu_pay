<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetailsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-fin-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nic') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'initials') ?>

    <?php // echo $form->field($model, 'epfNo') ?>

    <?php // echo $form->field($model, 'medicalFundContributor') ?>

    <?php // echo $form->field($model, 'salaryBankCode') ?>

    <?php // echo $form->field($model, 'bankAccountNo') ?>

    <?php // echo $form->field($model, 'bankAccountName') ?>

    <?php // echo $form->field($model, 'taxConsent') ?>

    <?php // echo $form->field($model, 'applicableTaxTable') ?>

    <?php // echo $form->field($model, 'bankLoanAmount') ?>

    <?php // echo $form->field($model, 'bankLoanReleaseDate') ?>

    <?php // echo $form->field($model, 'otherInfo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
