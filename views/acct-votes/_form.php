<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctProg;
use app\models\AcctProj;

/** @var yii\web\View $this */
/** @var app\models\AcctVotes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-votes-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">
                                    <?php

                                    $form = ActiveForm::begin();
                                    $program = AcctProg::find()->all();
                                    $listData = ArrayHelper::map($program, 'progCode', 'progDesc');
                                    echo $form->field($model, 'progCode')->dropDownList(
                                        $listData,
                                        [
                                            'prompt' => Yii::t('app', 'Choose_Program_Code'),
                                            'onchange' => '$.get( "' . Yii::$app->urlManager->createUrl(['acct-votes/dropdown']) . '", { id: $(this).val() })
                                                                .done(function(data) {
                                                                $("#subcat").html(data);
                                                                })
                                                                .fail(function() {
                                                                    console.error("AJAX request failed.");
                                                                })'
                                        ]
                                    ); ?>

                                    <label for="<?= $model->formName() ?>-rctLedger">Project Code</label>
                                    <?= $form->field($model, 'projCode', ['inputOptions' => ['id' => 'subcat']])->label(false)->dropDownList([]); ?>

                                    <div class="row">
                                        <div class="col-4">
                                            <?= $form->field($model, 'objCode')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-4">
                                            <?= $form->field($model, 'voteCode')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-4">
                                            <?= $form->field($model, 'voteSub')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'voteVote')->textInput(['maxlength' => true, 'placeholder' => 'Generate Automatically based above', 'disabled' => 'disabled']) ?>

                                    <?= $form->field($model, 'voteDesc')->textarea(['maxlength' => true, 'rows' => '2']) ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/acct-votes/index'], ['class' => 'btn btn-default pull-right']) ?>
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