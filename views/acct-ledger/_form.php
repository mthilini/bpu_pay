<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctLedgmain;

/** @var yii\web\View $this */
/** @var app\models\AcctLedger $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="row acct-ledger-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?php $form = ActiveForm::begin(); ?>

                                    <?php
                                    $mainLedgers = AcctLedgmain::find()->all();
                                    $listData = ArrayHelper::map($mainLedgers, 'mainCode', 'mainDesc');
                                    echo $form->field($model, 'mainCode')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select Main Ledger Code...']
                                    ); ?>
                                    <?= $form->field($model, 'ledgSub')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'ledgCode')->textInput(['maxlength' => true, 'placeholder' => 'Generate Automatically based above', 'disabled' => 'disabled']) ?>

                                    <?= $form->field($model, 'ledgDesc')->textInput(['maxlength' => true]) ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/acct-ledger/index'], ['class' => 'btn btn-default pull-right']) ?>
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