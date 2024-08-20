<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsCash $model */

$this->title = 'New Receipt';
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-rcts-cash-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
