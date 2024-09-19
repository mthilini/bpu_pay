<?php

use app\models\AcctLedger;
use app\models\PayBank;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFunds $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-fm-funds-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?php $form = ActiveForm::begin(); ?>

                                    <?= $form->field($model, 'fundName')->textarea(['maxlength' => true, 'rows' => '2']) ?>

                                    <div class="row">
                                        <div class="col-3">
                                            <?= $form->field($model, 'fundCode')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-4">
                                            <?= $form->field($model, 'fundBankType')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-5">
                                            <?= $form->field($model, 'fundBankAcct')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'fundBankCode')->dropDownList(
                                        ArrayHelper::map(PayBank::find()->orderBy('bankName')->all(), 'bankBank', 'bankName'),
                                        ['prompt' => 'Select Bank Name']
                                    ) ?>

                                    <?= $form->field($model, 'fundLedg')->dropDownList(
                                        ArrayHelper::map(AcctLedger::find()->orderBy('ledgDesc')->all(), 'ledgCode', 'ledgDesc'),
                                        ['prompt' => 'Select Ledger Code']
                                    ) ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/acct-fm-funds/index'], ['class' => 'btn btn-default pull-right']) ?>
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