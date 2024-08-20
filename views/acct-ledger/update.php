<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctLedger $model */

//$this->title = 'Update Account Ledger: ' . $model->id;
$this->title = 'Update Account Ledger: ' ;//. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acct Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-ledger-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
