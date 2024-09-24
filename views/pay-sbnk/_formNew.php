<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayBank;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */
/** @var yii\widgets\ActiveForm $form */
//
$UPFno = $model->empUPFNo;
?>

<div class="row pay-sbnk-form">
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
                                            <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true, 'value' => $UPFno, 'readOnly' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'sbnkRef')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="<?= $model->formName() ?>-sbnkStart">SO Start</label>
                                            <?= $form->field($model, 'sbnkStart')->label(false)->widget(DatePicker::classname(), [
                                                'language' => 'en',
                                                'dateFormat' => 'dd/MM/yyyy',
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
                                            <label for="<?= $model->formName() ?>-sbnkEnd">SO End</label>
                                            <?= $form->field($model, 'sbnkEnd')->label(false)->widget(DatePicker::classname(), [
                                                'language' => 'en',
                                                'dateFormat' => 'dd/MM/yyyy',
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
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <?= $form->field($model, 'sbnkAmt')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'sbnkLoan')->dropDownList(['1' => 'Yes', '0' => 'No']); ?>
                                        </div>
                                    </div>

                                    <?php
                                    $BankBank = PayBank::find()->all();
                                    $listData = ArrayHelper::map($BankBank, 'bankBank', 'bankName');
                                    echo $form->field($model, 'sbnkBank')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select Bank...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <?= $form->field($model, 'sbnkAcct')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'sbnkAName')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-sbnk/index'], ['class' => 'btn btn-default pull-right']) ?>
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