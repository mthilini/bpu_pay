<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TblUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row tbl-user-form">
    <div class="col-md-6 col-lg-5 col-xl-5">
        <table width="100%" xmlns="http://www.w3.org/1999/html">
            <tr>
                <td valign="top">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="panel-body">

                                <div class="user-view">

                                    <?php $form = ActiveForm::begin(); ?>

                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                                    <!-- <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
-->
                                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                                    <!--   <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
-->
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                                    <!--   <?= $form->field($model, 'status')->textInput() ?>

                                    <?= $form->field($model, 'role')->textInput() ?>

                                    <?= $form->field($model, 'created_at')->textInput() ?>

                                    <?= $form->field($model, 'updated_at')->textInput() ?>
                                    -->
                                    <p>
                                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Close', ['/tbl-user/index'], ['class' => 'btn btn-default pull-right']) ?>
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