<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayTaxtype $model */

$this->title = 'Create Pay Taxtype';
$this->params['breadcrumbs'][] = ['label' => 'Pay Taxtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-taxtype-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>