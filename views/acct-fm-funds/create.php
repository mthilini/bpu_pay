<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctFmFunds $model */

$this->title = 'New Fund Type';
$this->params['breadcrumbs'][] = ['label' => 'Fund Management Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-fm-funds-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>