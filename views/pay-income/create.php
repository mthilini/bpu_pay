<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayIncome $model */

$this->title = 'Create Pay Income';
$this->params['breadcrumbs'][] = ['label' => 'Pay Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-income-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>