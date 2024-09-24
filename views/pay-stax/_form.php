<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayTaxtype;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\PayStax $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-stax-form">
    <div class="col-md-6 col-lg-5 col-xl-4">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">
                                <div class="user-view">

                                    <?php $form = ActiveForm::begin(); ?>

                                    <div class="row">
                                        <div class="col-4">
                                            <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-4">
                                            <?= $form->field($model, 'staxRef')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-4">
                                            <?= $form->field($model, 'staxMoney')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?php
                                    $paytaxtypes = PayTaxtype::find()->all();
                                    $listData = ArrayHelper::map($paytaxtypes, 'taxCode', 'taxDesc');
                                    echo $form->field($model, 'staxFld')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select tax Code...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="<?= $model->formName() ?>-staxStart">S_Tax Start</label>
                                            <?= $form->field($model, 'staxStart')->label(false)->widget(DatePicker::classname(), [
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
                                            <label for="<?= $model->formName() ?>-staxEnd">S_Tax End</label>
                                            <?= $form->field($model, 'staxEnd')->label(false)->widget(DatePicker::classname(), [
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
                                            <?= $form->field($model, 'staxAmt')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'staxIncome')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-stax/index'], ['class' => 'btn btn-default pull-right']) ?>
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