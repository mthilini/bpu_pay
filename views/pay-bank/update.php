<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayBank $model */

$this->title = 'Update Bank Information: ' . $model->bankBank;
$this->params['breadcrumbs'][] = ['label' => 'Bank Information', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bankBank, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pay-bank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formU', [
        'model' => $model,
    ]) ?>

</div>
