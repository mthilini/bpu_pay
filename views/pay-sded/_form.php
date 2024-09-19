<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayFields;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\PaySded $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-sded-form">
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
                                            <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-6">
                                            <?= $form->field($model, 'sdedRef')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?php
                                    $payFields = PayFields::find()->where(['or', ['fldType' => 1], ['fldType' => 4]])->all();
                                    $listData = ArrayHelper::map($payFields, 'fldCode', 'fldName');
                                    echo $form->field($model, 'sdedFld')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select Pay Field...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="<?= $model->formName() ?>-sdedStart">SO Ded. Start</label>
                                            <?= $form->field($model, 'sdedStart')->label(false)->widget(DatePicker::classname(), [
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
                                            <label for="<?= $model->formName() ?>-sdedEnd">SO Ded. End</label>
                                            <?= $form->field($model, 'sdedEnd')->label(false)->widget(DatePicker::classname(), [
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
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <?= $form->field($model, 'sdedAmt')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-sded/index'], ['class' => 'btn btn-default pull-right']) ?>
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