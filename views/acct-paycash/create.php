<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPaycash $model */

$this->title = 'New Payment';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-paycash-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
