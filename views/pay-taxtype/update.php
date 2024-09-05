<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayTaxtype $model */

$this->title = 'Update Pay Tax Type: '; // . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Taxtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pay-taxtype-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>