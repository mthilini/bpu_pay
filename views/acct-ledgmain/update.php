<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgmain $model */

$this->title = 'Update Acct Ledgmain: ' . $model->id;
$this->title = 'Update Account Main Ledger Code: '; // . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acct Ledgmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="acct-ledgmain-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>