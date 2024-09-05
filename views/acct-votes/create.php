<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctVotes $model */

$this->title = 'Create Account Votes';
$this->params['breadcrumbs'][] = ['label' => 'Acct Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-votes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>