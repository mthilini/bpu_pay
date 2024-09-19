<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctFmEpfContr $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row acct-fm-epf-contr-form">
    <div class="col-md-6 col-lg-4 col-xl-3">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">
                                <div class="user-view">

                                    <?php $form = ActiveForm::begin(); ?>

                                    <div class="row">
                                        <div class="col-4">
                                            <?= $form->field($model, 'epfYear')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'epfBalStart')->textInput(['maxlength' => true]) ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/acct-fm-epf-contr/index'], ['class' => 'btn btn-default pull-right']) ?>
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