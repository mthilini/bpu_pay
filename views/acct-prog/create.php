<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AcctProg $model */

$this->title = 'Create Account Program';
$this->params['breadcrumbs'][] = ['label' => 'Acct. Prog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-prog-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>