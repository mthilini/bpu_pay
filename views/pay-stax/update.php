<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayStax $model */

$this->title = 'Update Pay S_Tax: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Staxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-stax-update">

  <?= $this->render('_form', [
    'model' => $model,
  ]) ?>

</div>