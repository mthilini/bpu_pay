<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFunds $model */

$this->title = 'Update Fund Management Types: ' . $model->fundCode;
$this->params['breadcrumbs'][] = ['label' => 'Fund Management Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fundCode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-fm-funds-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formU', [
        'model' => $model,
    ]) ?>

</div>
