<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPaycash $model */

$this->title = 'Update Payment: ' . $model->payVch.'-'.$model->paySub;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payVch.'-'.$model->paySub, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-paycash-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
