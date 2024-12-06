<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayhdSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-payhd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'action' => ['/pay-payhd/sbnk-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Field</label>
                <select name="bankBank" id="bankBank" class="form-control">
                    <option value="0">All</option>
                    <?php if ($payFields != null) {
                        foreach ($payFields as $key => $payField) {
                    ?>
                            <option value="<?= $payField['bankBank']; ?>" <?= (!empty($request['bankBank']) && $request['bankBank'] == $payField['bankBank']) ? 'selected="selected"' : '' ?>><?= $payField['bankName']; ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3">
                <label>Date</label>
                <input id="date" name="date" class="form-control" type="date" <?php if (!empty($request['date'])) echo "value=\"" . $request['date'] . "\""; ?> />
            </div>
            <div class="form-group col-lg-2 col-md-3 col-sm-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-payhd/sbnk-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />