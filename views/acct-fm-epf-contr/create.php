<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctFmEpfContr $model */

$this->title = 'EPF Contribution Opening Balance';
$this->params['breadcrumbs'][] = ['label' => 'Employee EPF Contribution', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-fm-epf-contr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
