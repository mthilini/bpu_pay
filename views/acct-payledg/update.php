<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledg $model */

$this->title = 'Update Payment-Ledger: ';// . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Payment-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="acct-payledg-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
