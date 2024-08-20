<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctPayhdr $model */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-payhdr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsCash' => (empty($modelsCash)) ? [new AcctPaycash] : $modelsCash,
        'modelsLedger' => (empty($modelsLedger)) ? [new AcctPayledg] : $modelsLedger
    ]) ?>

</div>
