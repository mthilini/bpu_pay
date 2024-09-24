<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PayA5type;  //A5Type Drop-down list
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\PaySa5 $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-sa5-form">
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
                                            <?= $form->field($model, 'sa5Ref')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?php
                                    $a5types = PayA5type::find()->all();
                                    $listData = ArrayHelper::map($a5types, 'a5Code', 'a5Desc');
                                    echo $form->field($model, 'sa5Fld')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select A5 Code...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="<?= $model->formName() ?>-sa5Start">SA5 Start</label>
                                            <?= $form->field($model, 'sa5Start')->label(false)->widget(DatePicker::classname(), [
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
                                            <label for="<?= $model->formName() ?>-sa5End">SA5 End</label>
                                            <?= $form->field($model, 'sa5End')->label(false)->widget(DatePicker::classname(), [
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
                                            <?= $form->field($model, 'sa5Amt')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-sa5/index'], ['class' => 'btn btn-default pull-right']) ?>
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