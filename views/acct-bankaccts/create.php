<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctBankaccts $model */

$this->title = 'Create Acct Bankaccts';
$this->params['breadcrumbs'][] = ['label' => 'Acct Bankaccts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-bankaccts-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>