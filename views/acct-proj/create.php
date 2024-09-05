<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctProj $model */

$this->title = 'Create Account Project';
$this->params['breadcrumbs'][] = ['label' => 'Acct Proj', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-proj-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>