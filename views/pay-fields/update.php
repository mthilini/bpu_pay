<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayFields $model */

$this->title = 'Update Fixed Salary Field: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-fields-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>