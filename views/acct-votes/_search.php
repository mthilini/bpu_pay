<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctVotesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-votes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'progCode') ?>

    <?= $form->field($model, 'projCode') ?>

    <?= $form->field($model, 'objCode') ?>

    <?= $form->field($model, 'voteCode') ?>

    <?php // echo $form->field($model, 'voteSub') ?>

    <?php // echo $form->field($model, 'voteVote') ?>

    <?php // echo $form->field($model, 'voteDesc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
