<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledgSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="acct-payledg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'action' => ['/acct-payledg/vote-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-2">
                <label>Vote</label>
                <select name="vote" id="vote" class="form-control">
                    <option></option>
                    <?php if ($votes != null) {
                        foreach ($votes as $key => $vote) {
                    ?>
                            <option <?= (!empty($request['vote']) && $request['vote'] == $vote) ? 'selected="selected"' : '' ?>><?= $vote; ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="col-3">
                <label>Date</label>
                <div class="row">
                    <div class="col-6">
                        <input id="from" name="from" class="form-control" type="date" <?php if (!empty($request['from'])) echo "value=\"" . $request['from'] . "\""; ?> />
                    </div>
                    <div class="col-6">
                        <input id="to" name="to" class="form-control" type="date" <?php if (!empty($request['to'])) echo "value=\"" . $request['to'] . "\""; ?> />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/acct-payledg/vote-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />