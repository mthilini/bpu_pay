<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayA5type $model */

$this->title = 'Update Pay A5 Type: '; // . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay A5 Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pay-a5type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
