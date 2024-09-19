<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayIncome $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-income-form">
    <div class="col-md-6 col-lg-5 col-xl-3">
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
                                            <?= $form->field($model, 'empUPFNo')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-3">
                                            <?= $form->field($model, 'incMon')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-4">
                                            <?= $form->field($model, 'incYear')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'incIncome')->textInput(['maxlength' => true]) ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-income/index'], ['class' => 'btn btn-default pull-right']) ?>
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