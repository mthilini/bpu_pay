<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctLedgsub $model */

$this->title = 'Create Ledger Sub Code';
$this->params['breadcrumbs'][] = ['label' => 'Ledger Sub Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-ledgsub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
