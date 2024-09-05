<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctProj $model */

$this->title = 'Update Account Project: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acct Proj', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="acct-proj-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>