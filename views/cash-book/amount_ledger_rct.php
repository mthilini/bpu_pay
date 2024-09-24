<?php
use yii\helpers\Html;
?>

<!--amount remarks add-->
<div class="row">
    <div class="col-3">
        <?= $form->field($model_ledger, 'rctAmount')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-7">
        <?= $form->field($model_ledger, 'rctRmks')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-2 d-flex align-items-end justify-content-start">
        <?= Html::Button('Add', ['class' => 'btn btn-sm btn-success']) ?>
    </div>
</div>