<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySded $model */

$this->title = 'Update Standing Order Deduction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'SO Deduc.', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-sded-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
