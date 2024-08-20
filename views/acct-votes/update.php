<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctVotes $model */

$this->title = 'Update Account Votes: ';// . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acct Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-votes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
