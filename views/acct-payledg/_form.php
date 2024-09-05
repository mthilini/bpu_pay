<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctLedgmain;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledg $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-payledg-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?php $form = ActiveForm::begin(); ?>

                                    <!-- <?= $form->field($model, 'payDate')->textInput() ?> -->

                                    <label for="<?= $model->formName() ?>-payDate">Payment Date</label>
                                    <?= $form->field($model, 'payDate')->label(false)->widget(\yii\jui\DatePicker::classname(), [
                                        'language' => 'en',
                                        'dateFormat' => 'yyyy-MM-dd',
                                    ]) ?>

                                    <?= $form->field($model, 'payVch')->textInput() ?>

                                    <?= $form->field($model, 'paySub')->textInput(['maxlength' => true]) ?><div class="row">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?= $form->field($model, 'mainCode')->dropDownList(
                                                    ArrayHelper::map(
                                                        \app\models\AcctLedgmain::find()->all(),
                                                        'mainCode',
                                                        'mainDesc'
                                                    ),
                                                    [
                                                        'prompt' => Yii::t('app', 'Choose_mainCode'),
                                                        'onchange' => '$.get( "' . Yii::$app->urlManager->createUrl(['acct-payledg/dropdown']) . '", { id: $(this).val() })
                                                                        .done(function(data) {
                                                                        $("#subcat").html(data);
                                                                        })
                                                                        .fail(function() {
                                                                            console.error("AJAX request failed.");
                                                                        })'
                                                    ]
                                                );
                                                ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="<?= $model->formName() ?>-payLedg">Ledger</label>
                                                <?= $form->field($model, 'payLedg', ['inputOptions' => ['id' => 'subcat']])->label(false)->dropDownList([]); ?>
                                            </div>
                                        </div> <!-- end of row -->
                                        <?= $form->field($model, 'payAmount')->textInput(['maxlength' => true]) ?>

                                        <?= $form->field($model, 'payRmks')->textInput(['maxlength' => true]) ?>

                                        <?= $form->field($model, 'payCashBk')->textInput(['maxlength' => true]) ?>

                                        <?= $form->field($model, 'payDept')->textInput(['maxlength' => true]) ?>

                                        <p>
                                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                            <?= Html::a('Close', ['/acct-payledg'], ['class' => 'btn btn-default pull-right']) ?>
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