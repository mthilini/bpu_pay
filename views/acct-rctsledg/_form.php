<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctLedgmain;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledg $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-rctsledg-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?php $form = ActiveForm::begin(); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="<?= $model->formName() ?>-rctDate">Receipt Date</label>
                                            <?= $form->field($model, 'rctDate')->label(false)->widget(DatePicker::classname(), [
                                                'language' => 'en',
                                                'dateFormat' => 'yyyy-MM-dd',
                                                'clientOptions' => [
                                                    'changeMonth' => true,
                                                    'yearRange' => '1996:2099',
                                                    'changeYear' => true,
                                                    'showOn' => 'button',
                                                    'buttonImage' => 'images/calendar.gif',
                                                    'buttonImageOnly' => true,
                                                    'buttonText' => 'Select date'
                                                ],
                                            ])->textInput(['type' => 'date']) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'rctNo')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <?= $form->field($model, 'rctSub')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'rctAmount')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <!-- <?= $form->field($model, 'rctLedger')->textInput(['maxlength' => true]) ?> -->

                                    <?= $form->field($model, 'mainCode')->dropDownList(
                                        ArrayHelper::map(
                                            \app\models\AcctLedgmain::find()->all(),
                                            'mainCode',
                                            'mainDesc'
                                        ),
                                        [
                                            'prompt' => Yii::t('app', 'Choose_mainCode'),
                                            'onchange' => '$.get( "' . Yii::$app->urlManager->createUrl(['acct-rctsledg/dropdown']) . '", { id: $(this).val() })
                                                                    .done(function(data) {
                                                                    $("#subcat").html(data);
                                                                    })
                                                                    .fail(function() {
                                                                        console.error("AJAX request failed.");
                                                                    })'
                                        ]
                                    );
                                    ?>

                                    <label for="<?= $model->formName() ?>-rctLedger">Ledger</label>
                                    <?= $form->field($model, 'rctLedger', ['inputOptions' => ['id' => 'subcat']])->label(false)->dropDownList([]); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <?= $form->field($model, 'rctCashBk')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'rctDept')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'rctRmks')->textarea(['maxlength' => true, 'rows' => '3']) ?>
                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/acct-rctsledg/index'], ['class' => 'btn btn-default pull-right']) ?>
                                    </p>

                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>