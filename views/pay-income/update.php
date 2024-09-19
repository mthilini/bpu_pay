<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayIncome $model */

$this->title = 'Update Pay Income: '; // . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-income-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>