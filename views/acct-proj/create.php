<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctProj $model */

$this->title = 'Create Account Project';
$this->params['breadcrumbs'][] = ['label' => 'Acct Proj', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-proj-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
