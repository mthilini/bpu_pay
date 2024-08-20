<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPayhdr $model */

$this->title = 'Update Acct Payhdr: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acct Payhdrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-payhdr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
