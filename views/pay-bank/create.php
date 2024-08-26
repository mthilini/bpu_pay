<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayBank $model */

$this->title = 'Create New Bank';
$this->params['breadcrumbs'][] = ['label' => 'Bank Information', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-bank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>