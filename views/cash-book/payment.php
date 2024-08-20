<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPaycash $model */

$this->title = 'New Payment';
$this->params['breadcrumbs'][] = ['label' => 'Cash Book', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-paycash-create">

    <?= $this->render('_form_payment', [
        'model_cash' => $model_cash,
        'model_ledger' => $model_ledger,
    ]) ?>

</div>
