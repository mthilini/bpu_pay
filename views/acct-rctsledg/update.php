<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledg $model */

$this->title = 'Update Receipt-Ledger: '; // . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receipt-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="acct-rctsledg-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>