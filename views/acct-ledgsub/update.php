<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgsub $model */

$this->title = 'Update Ledger Sub Code: ' . $model->lsubCode;
$this->params['breadcrumbs'][] = ['label' => 'Ledger Sub Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lsubCode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="acct-ledgsub-update">

    <?= $this->render('_formU', [
        'model' => $model,
    ]) ?>

</div>