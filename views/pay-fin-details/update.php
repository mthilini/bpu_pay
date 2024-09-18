<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetails $model */
$title = $model->title." ". $model->initials." ". $model->surname;
//
$this->title = 'Update Employee Details (Finance): ' . $title;
$this->params['breadcrumbs'][] = ['label' => 'Pay Fin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-fin-details-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
