<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySeml $model */

$this->title = 'Update Standing Order Allowance: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'SO Allow.', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-seml-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>