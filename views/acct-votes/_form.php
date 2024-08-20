<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctProg;
use app\models\AcctProj;

/** @var yii\web\View $this */
/** @var app\models\AcctVotes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-votes-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    //use app\models\AcctProg; //Program Drop-down list
    $program=AcctProg::find()->all();
    //use yii\helpers\ArrayHelper;
    $listData=ArrayHelper::map($program,'progCode','progDesc');
    echo $form->field($model, 'progCode')->dropDownList(
        $listData,
	[
            'prompt' => Yii::t('app', 'Choose_Program_Code'),
            'onchange' => '$.get( "'.Yii::$app->urlManager->createUrl(['acct-votes/dropdown']) . '", { id: $(this).val() })
            .done(function(data) {
            $("#subcat").html(data);
            })
            .fail(function() {
                console.error("AJAX request failed.");
            })'
        ]
    );?>
    <label for="<?= $model->formName() ?>-rctLedger">Project Code</label>
    <?= $form->field($model, 'projCode', ['inputOptions' => ['id' => 'subcat']])->label(false)->dropDownList([]); ?>
    <?= $form->field($model, 'objCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voteCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voteSub')->textInput(['maxlength' => true]) ?>

 <!--   <?= $form->field($model, 'voteVote')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'voteVote')->textInput(['maxlength' => true,'placeholder' => 'Generate Automatically based above', 'disabled' => 'disabled']) ?>

    <?= $form->field($model, 'voteDesc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
