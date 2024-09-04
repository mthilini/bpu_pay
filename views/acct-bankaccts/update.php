<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctBankaccts $model */

$this->title = 'Update Cashbook Details: ' . $model->bactAcctCode;
$this->params['breadcrumbs'][] = ['label' => 'Cashbook Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bactAcctCode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-bankaccts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>