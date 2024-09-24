<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PayFields;

/** @var yii\web\View $this */
/** @var app\models\PaySeml $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-seml-form">
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
                                            <?= $form->field($model, 'semlRef')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <!--   <?= $form->field($model, 'semlFld')->textInput(['maxlength' => true]) ?>-->

                                    <?php

                                    $payFields = PayFields::find()->where(['fldType' => 0])->all();
                                    $listData = ArrayHelper::map($payFields, 'fldCode', 'fldName');
                                    echo $form->field($model, 'semlFld')->dropDownList(
                                        $listData,
                                        ['prompt' => 'Select Pay Field...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="<?= $model->formName() ?>-semlStart">SO Allow. Start</label>
                                            <?= $form->field($model, 'semlStart')->label(false)->widget(\yii\jui\DatePicker::classname(), [
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
                                            <label for="<?= $model->formName() ?>-semlEnd">SO Allow. End</label>
                                            <?= $form->field($model, 'semlEnd')->label(false)->widget(\yii\jui\DatePicker::classname(), [
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
                                            <?= $form->field($model, 'semlAmt')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-seml/index'], ['class' => 'btn btn-default pull-right']) ?>
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