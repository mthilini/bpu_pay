<?php
use Yii;
use yii\helpers\Html;
use app\models\PaySbnk;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */

$this->title = 'Update Pay Standing Order ';// . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sbnks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
//
$getID= Yii::$app->request->queryParams['id']; 
$getUPFno=PaySbnk::getUPFno($getID);
$empName=Employee::getEmpName($getUPFno);
//$empName="$getUPFno";
?>
<div class="pay-sbnk-update">

    <h1><?= Html::encode($this->title)."-". $empName ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
