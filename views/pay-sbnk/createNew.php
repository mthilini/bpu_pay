<?php

use yii\helpers\Html;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */
//

$UPFno = $model->empUPFNo;
$employeemodel = new Employee();
$empName = $employeemodel->getEmpName($UPFno);

$this->title = 'Create Pay Standing Order -' . $empName;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sbnks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-sbnk-create">

    <?= $this->render('_formNew', [
        'model' => $model,
        'upf' => $UPFno
    ]) ?>

</div>