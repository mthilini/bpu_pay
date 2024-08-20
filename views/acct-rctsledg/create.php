<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsledg $model */

$this->title = 'Create Receipt-Ledger';
$this->params['breadcrumbs'][] = ['label' => 'Receipt-Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-rctsledg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
