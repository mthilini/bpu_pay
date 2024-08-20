<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsCash $model */

$this->title = 'Update Receipt: ' .  $model->rctNo.'-'.$model->rctSub;
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rctNo.'-'.$model->rctSub, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-rcts-cash-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
