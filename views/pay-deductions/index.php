<?php

use app\models\PayDeductions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PayDeductionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Deductions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-deductions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pay Deductions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
	    'empUPFNo',
	    [
                'label' => 'Emp. Name',
                'value' =>  function($model) {
                 	$employeemodel = new Employee();
                    	$employeeName = $employeemodel->getEmpName($model->empUPFNo);
                    	return $employeeName;
               },
            'format' => 'raw',
            ],
            'dedMon',
            'dedYear',
	    //'dedDeduction',
	    ['label' => 'Deduction (Rs.)',
                'attribute' =>'dedDeduction',
                'format'=>['currency'],
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PayDeductions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
