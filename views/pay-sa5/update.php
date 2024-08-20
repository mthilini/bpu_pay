<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySa5 $model */

$this->title = 'Update Pay Sa5: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sa5s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pay-sa5-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
