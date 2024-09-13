<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\AcctProg;

/** @var yii\web\View $this */
/** @var app\models\AcctProj $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-proj-form">
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
                                        ['prompt' => 'Select Program...']
                                    ); ?>

                                    <div class="row">
                                        <div class="col-5">
                                            <?= $form->field($model, 'projCode')->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-7">
                                            <?= $form->field($model, 'projDesc')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/acct-proj/index'], ['class' => 'btn btn-default pull-right']) ?>
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