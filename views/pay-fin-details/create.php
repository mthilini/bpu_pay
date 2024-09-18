<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayFinDetails $model */

$this->title = 'Create Employee Details (Finance)';
$this->params['breadcrumbs'][] = ['label' => 'Pay Fin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-fin-details-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>