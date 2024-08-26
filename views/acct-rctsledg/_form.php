<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctLedgmain;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledg $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-rctsledg-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'rctDate')->textInput() ?> -->
    <label for="<?= $model->formName() ?>-rctDate">Receipt Date</label>
    <?= $form->field($model, 'rctDate')->label(false)->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'en',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <?= $form->field($model, 'rctNo')->textInput() ?>

    <?= $form->field($model, 'rctSub')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'rctLedger')->textInput(['maxlength' => true]) ?> -->
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'mainCode')->dropDownList(
                ArrayHelper::map(
                \app\models\AcctLedgmain::find()->all(),
                'mainCode','mainDesc'),
                [
                    'prompt' => Yii::t('app', 'Choose_mainCode'),
                    'onchange' => '$.get( "'.Yii::$app->urlManager->createUrl(['acct-rctsledg/dropdown']) . '", { id: $(this).val() })
                    .done(function(data) {
                    $("#subcat").html(data);
                    })
                    .fail(function() {
                        console.error("AJAX request failed.");
                    })'
                ]
            );
            ?>
        </div>
        <div class="col-sm-6">
            <label for="<?= $model->formName() ?>-rctLedger">Ledger</label>
            <?= $form->field($model, 'rctLedger', ['inputOptions' => ['id' => 'subcat']])->label(false)->dropDownList([]); ?>
        </div>
    </div> <!-- end of row -->

    <?= $form->field($model, 'rctAmount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rctRmks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rctCashBk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rctDept')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>