<?php

use yii\helpers\Html;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */

$getUPFno = $model->empUPFNo;
$employeemodel = new Employee();
$empName = $employeemodel->getEmpName($model->empUPFNo);

$this->title = 'Update Pay Standing Order ' . $model->id . '-' . $empName;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sbnks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>

<div class="pay-sbnk-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>