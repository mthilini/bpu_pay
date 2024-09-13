<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgmain $model */

$this->title = 'Create Account Ledger-Main';
$this->params['breadcrumbs'][] = ['label' => 'Acct Ledgmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-ledgmain-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
