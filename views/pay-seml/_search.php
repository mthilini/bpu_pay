<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetailsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-fin-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-4">
                        <label for="from">SO Allow. From</label>
                        <input id="from" name="from" class="form-control" type="date" <?php if (isset($request['from'])) echo "value=\"" . $request['from'] . "\""; ?> />
                    </div>
                    <div class="col-4">
                        <label for="to">SO Allow. To</label>
                        <input id="to" name="to" class="form-control" type="date" <?php if (isset($request['to'])) echo "value=\"" . $request['to'] . "\""; ?> />
                    </div>
                    <div class="col-4 justify-end">
                        <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm', 'style' => 'margin-right: 3px;']) ?>
                        <?= Html::a('Reset', ['/pay-seml/report'], ['class' => 'btn btn-secondary btn-sm']) ?>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />