<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySeml $model */

$this->title = 'Add Standing Order Allowance';
$this->params['breadcrumbs'][] = ['label' => 'So Allow.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-seml-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
