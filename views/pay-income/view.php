<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PayIncome;

/** @var yii\web\View $this */
/** @var app\models\PayIncome $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Incomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//
////
$getID= Yii::$app->request->queryParams['id'];
$getUPFno=PayIncome::getUPFno($getID);
$empName=Employee::getEmpName($getUPFno);
echo "<h3>Employee Name: $empName</h3>";
?>
<div class="pay-income-view">

<!--    <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'empUPFNo',
            'incMon',
            'incYear',
	    //'incIncome',
	    ['label' => 'Income (Rs.)',
                'attribute' =>'incIncome',
                'format'=>['currency'],
            ],

        ],
    ]) ?>

</div>
