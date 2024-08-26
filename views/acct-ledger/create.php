<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctLedger $model */

$this->title = 'Create Account Ledger';
$this->params['breadcrumbs'][] = ['label' => 'Account Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-ledger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>