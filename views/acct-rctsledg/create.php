<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledg $model */

$this->title = 'Create Receipt-Ledger';
$this->params['breadcrumbs'][] = ['label' => 'Receipt-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-rctsledg-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>