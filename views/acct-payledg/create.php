<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPayledg $model */

$this->title = 'Create Payment-Ledger';
$this->params['breadcrumbs'][] = ['label' => 'Payment-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-payledg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
