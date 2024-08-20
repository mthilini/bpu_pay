<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PaySded;

/** @var yii\web\View $this */
/** @var app\models\PaySded $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'SO Deduc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//
//
////
$getID= Yii::$app->request->queryParams['id'];
$getUPFno=PaySded::getUPFno($getID);
$empName=Employee::getEmpName($getUPFno);
echo "<h3>Employee Name: $empName</h3>";
?>
<div class="pay-sded-view">

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
            'sdedRef',
	    //'sdedFld',
	     ['label' => 'SO Ded.. Field',
             'value' => function ($model) {
                return $model->payField0->fldName;
             },],
            'sdedStart',
            'sdedEnd',
	    //'sdedAmt',
	     ['label' => 'Amount (Rs.)',
                'attribute' =>'sdedAmt',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format'=>['currency'],
            ],

        ],
    ]) ?>

</div>
