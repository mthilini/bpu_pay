<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PaySa5 $model */

$this->title = 'Create Pay Sa5';
$this->params['breadcrumbs'][] = ['label' => 'Pay Sa5s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-sa5-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>