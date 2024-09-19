<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */

$this->title = 'Create Pay Standing Order';
$this->params['breadcrumbs'][] = ['label' => 'Pay Sbnks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-sbnk-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>