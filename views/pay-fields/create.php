<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PayFields $model */

$this->title = 'Create Pay Fields';
$this->params['breadcrumbs'][] = ['label' => 'Pay Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
