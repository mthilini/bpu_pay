<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayStax $model */

$this->title = 'Create Pay Stax';
$this->params['breadcrumbs'][] = ['label' => 'Pay Staxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-stax-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>