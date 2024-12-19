<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayPayIprSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pay-payipr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
        'action' => ['/pay-ipr/individual-detail-recon-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4">
                <label>Employee</label>
                <input type="text" id="empUPFNo" name="empUPFNo" class="form-control" value="<?= (isset($_REQUEST['empUPFNo']) && !empty($_REQUEST['empUPFNo'])) ? $_REQUEST['empUPFNo'] : ''; ?>" title="1 to 8 characters" maxlength="8">
            </div>
            <div class="form-group col-lg-2 col-md-3 col-sm-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-ipr/individual-detail-recon-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />