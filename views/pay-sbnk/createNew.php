<?php

use yii\helpers\Html;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */
//
$UPFno= Yii::$app->request->queryParams['upf'];
//$getUPFno=PaySbnk::getUPFno($getID);
$empName=Employee::getEmpName($UPFno);
//$empName="$getUPFno";

//
$this->title = 'Create Pay Standing Order -'.$empName;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sbnks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-sbnk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formNew', [
        'model' => $model,'upf'=>$UPFno
    ]) ?>

</div>
