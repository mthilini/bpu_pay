<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySded $model */

$this->title = 'Add Standing Order Deduction';
$this->params['breadcrumbs'][] = ['label' => 'SO Deduc.', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-sded-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
