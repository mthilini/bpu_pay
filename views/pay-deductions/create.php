<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayDeductions $model */

$this->title = 'Create Pay Deductions';
$this->params['breadcrumbs'][] = ['label' => 'Pay Deductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-deductions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>