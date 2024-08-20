<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Employee;
use app\models\PaySbnk;
/** @var yii\web\View $this */
/** @var app\models\PaySbnk $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Sbnks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//
////
$getID= Yii::$app->request->queryParams['id'];
$getUPFno=PaySbnk::getUPFno($getID);
$empName=Employee::getEmpName($getUPFno);
echo "<h3>Employee Name: $empName</h3>";
?>
<div class="pay-sbnk-view">

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
            'sbnkRef',
            'sbnkStart',
            'sbnkEnd',
	    //'sbnkAmt',
	     ['label' => 'Amount (Rs.)',
                'attribute' =>'sbnkAmt',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format'=>['currency'],
            ],
            'sbnkBank',
            'sbnkAcct',
            'sbnkAName',
	    //'sbnkLoan',
	    ['label'=>'SO Loan',
            'value' => function($model) {
                return $model->sbnkLoan == 1 ? 'Yes' : 'No';}
            ],

        ],
    ]) ?>

</div>
