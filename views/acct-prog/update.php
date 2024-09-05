<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctProg $model */

$this->title = 'Update Acctount Program: '; //. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acct Prog', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="acct-prog-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>