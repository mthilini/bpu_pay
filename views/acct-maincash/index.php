<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctMaincash $model */
/** @var ActiveForm $form */
?>
<div class="acct-maincash-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id') ?>
        <?= $form->field($model, 'mainVchRct') ?>
        <?= $form->field($model, 'mainDate') ?>
        <?= $form->field($model, 'mainAmount') ?>
        <?= $form->field($model, 'mainDeduct') ?>
        <?= $form->field($model, 'mainSub') ?>
        <?= $form->field($model, 'mainCat') ?>
        <?= $form->field($model, 'mainCashBk') ?>
        <?= $form->field($model, 'mainType') ?>
        <?= $form->field($model, 'mainRmks') ?>
        <?= $form->field($model, 'mainChqCan') ?>
        <?= $form->field($model, 'mainChqPrc') ?>
        <?= $form->field($model, 'mainPayRct') ?>
        <?= $form->field($model, 'mainName') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- acct-maincash-index -->
