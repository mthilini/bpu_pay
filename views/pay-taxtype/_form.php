<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayTaxtype $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row pay-taxtype-form">
    <div class="col-md-6 col-lg-5 col-xl-4">
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
                                            <?= $form->field($model, 'taxCode')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>

                                    <?= $form->field($model, 'taxDesc')->textarea(['maxlength' => true, 'rows' => '2']) ?>

                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/pay-taxtype/index'], ['class' => 'btn btn-default pull-right']) ?>
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