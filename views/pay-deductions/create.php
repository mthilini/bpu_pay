<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayDeductions $model */

$this->title = 'Create Pay Deductions';
$this->params['breadcrumbs'][] = ['label' => 'Pay Deductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-deductions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
