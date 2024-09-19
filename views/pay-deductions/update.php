<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayDeductions $model */

$this->title = 'Update Pay Deductions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Deductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-deductions-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>