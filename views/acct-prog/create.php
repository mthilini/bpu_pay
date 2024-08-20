<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctProg $model */

$this->title = 'Create Account Program';
$this->params['breadcrumbs'][] = ['label' => 'Acct. Prog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-prog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
