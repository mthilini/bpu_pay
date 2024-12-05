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
        'action' => ['/pay-payhd/sa13-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <label>Field</label>
                <select name="a13Code" id="a13Code" class="form-control">
                    <option></option>
                    <?php if ($payFields != null) {
                        foreach ($payFields as $key => $payField) {
                    ?>
                            <option value="<?= $payField['a13Code']; ?>" <?= (!empty($request['a13Code']) && $request['a13Code'] == $payField['a13Code']) ? 'selected="selected"' : '' ?>><?= $payField['a13Desc']; ?></option>
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
                <?= Html::a('Reset', ['/pay-payhd/sa13-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />