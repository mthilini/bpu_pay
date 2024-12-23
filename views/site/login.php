<?php

use yii\helpers\Html;

$this->registerCssFile(Yii::getAlias('@web') . '/css/login.css');
$this->title = 'Login';

?>
<div class="site-login">
    <div class="login-header">BPU - Accounts System</div>
    <div class="row login-body d-flex justify-content-center">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

                <?= $form->field($model, 'username', [
                    'options' => ['class' => 'form-group has-feedback'],
                    'inputTemplate' => '{input}<span class="fas fa-envelope input-icon"></span>',
                    'template' => '{beginWrapper}{input}{error}{endWrapper}',
                    'wrapperOptions' => ['class' => 'input-group mb-3']
                ])
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

                <?= $form->field($model, 'password', [
                    'options' => ['class' => 'form-group has-feedback'],
                    'inputTemplate' => '{input}<span class="fas fa-lock input-icon"></span>',
                    'template' => '{beginWrapper}{input}{error}{endWrapper}',
                    'wrapperOptions' => ['class' => 'input-group mb-3']
                ])
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

                <div class="row">
                    <div class="col-8">
                        <?= $form->field($model, 'rememberMe')->checkbox([
                            // 'uncheck' => null
                        ]); ?>
                    </div>
                    <div class="col-4">
                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>

                <?php \yii\bootstrap4\ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>