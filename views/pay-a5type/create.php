<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayA5type $model */

$this->title = 'Create Pay A5 Type';
$this->params['breadcrumbs'][] = ['label' => 'Pay A5 Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-a5type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
