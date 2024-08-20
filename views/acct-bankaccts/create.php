<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctBankaccts $model */

$this->title = 'Create Acct Bankaccts';
$this->params['breadcrumbs'][] = ['label' => 'Acct Bankaccts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-bankaccts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
