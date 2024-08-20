<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctFmEpfContr $model */

$this->title = 'Update EPF Contribution Opening Balance : ' . $model->empUPFNo;
$this->params['breadcrumbs'][] = ['label' => 'Employee EPF Contribution', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empUPFNo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acct-fm-epf-contr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formU', [
        'model' => $model,
    ]) ?>

</div>
