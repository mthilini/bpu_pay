<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayFieldType;
//
/** @var yii\web\View $this */
/** @var app\models\PayFields $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-fields-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?php $form = ActiveForm::begin(); ?>

                                    <?= $form->field($model, 'fldCode')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'fldName')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'fldUPF')->checkbox() ?>

                                    <?= $form->field($model, 'fldETF')->checkbox() ?>

                                    <?php
                                    $payFieldTypes = PayFieldType::find()->all();
                                    $listData = ArrayHelper::map($payFieldTypes, 'typeCode', 'typeName');
                                    echo $form->field($model, 'fldType')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select Field Type...']
                                    ); ?>

                                    <?= $form->field($model, 'fldCat')->textInput(['maxlength' => true]) ?>

                                    <div class="form-group">

                                    </div>

                                    <?php ActiveForm::end(); ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-fields/index'], ['class' => 'btn btn-default pull-right']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>