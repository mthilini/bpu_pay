<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayBank;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetails $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-fin-details-form">
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
                                        <div class="col-5">
                                            <?= $form->field($model, 'epfNo')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-7">
                                            <?= $form->field($model, 'medicalFundContributor')->dropDownList(['1' => 'Yes', '0' => 'No'], ['prompt' => 'Select Option']);
                                            ?>
                                        </div>
                                    </div>

                                    <?php
                                    $BankBank = PayBank::find()->orderBy('bankName ASC')->all();
                                    $listData = ArrayHelper::map($BankBank, 'bankBank', 'bankName');
                                    echo $form->field($model, 'salaryBankCode')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select Bank...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-5">
                                            <?= $form->field($model, 'bankAccountNo')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-7">
                                            <?= $form->field($model, 'bankAccountName')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <?= $form->field($model, 'taxConsent')->dropDownList(['1' => 'Yes', '0' => 'No'], ['prompt' => 'Select Option']);
                                            ?>
                                        </div>
                                        <div class="col-7">
                                            <?= $form->field($model, 'applicableTaxTable')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <label for="<?= $model->formName() ?>-bankLoanReleaseDate">Bank Loan Release Date</label>
                                            <?= $form->field($model, 'bankLoanReleaseDate')->label(false)->widget(\yii\jui\DatePicker::classname(), [
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
                                        <div class="col-7">
                                            <?= $form->field($model, 'bankLoanAmount')->textInput(['value' => '000', 'maxlength' => true]);  ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'otherInfo')->textInput(['maxlength' => true]) ?>
                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-fin-details/index'], ['class' => 'btn btn-default pull-right']) ?>
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