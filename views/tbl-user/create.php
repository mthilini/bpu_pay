<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblUser $model */

$this->title = 'Create Tbl User';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tbl-user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>