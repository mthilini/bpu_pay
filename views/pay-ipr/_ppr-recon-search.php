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
        'action' => ['/pay-ipr/ppr-recon-report'],
    ]); ?>

    <div class="m-2">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3">
                <label>Program</label>
                <input type="text" id="deptProg" name="deptProg" class="form-control" value="<?= (isset($_REQUEST['deptProg']) && !empty($_REQUEST['deptProg'])) ? $_REQUEST['deptProg'] : ''; ?>" title="1 to 2 characters" maxlength="2">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3">
                <label>Project</label>
                <input type="text" id="deptProj" name="deptProj" class="form-control" value="<?= (isset($_REQUEST['deptProj']) && !empty($_REQUEST['deptProj'])) ? $_REQUEST['deptProj'] : ''; ?>" title="1 to 3 characters" maxlength="3">
            </div>
            <div class="form-group col-lg-2 col-md-3 col-sm-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Reset', ['/pay-ipr/ppr-recon-report'], ['class' => 'btn btn-secondary btn-sm']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<hr />