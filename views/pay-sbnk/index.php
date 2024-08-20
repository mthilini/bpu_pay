<?php

use app\models\PaySbnk;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySbnkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bank Standing Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-sbnk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pay SO', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
	    'empUPFNo',
	     //'empUPFNo',
            [
                //'attribute' => 'empUPFNo',
                'label' => 'Emp. Name',
                'value' =>  function($model) {
                    $employeemodel = new Employee();
                    $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                    return $employeeName;
               },
            'format' => 'raw',
            ],
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
	    [ 'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {myButton}',  // the default buttons + your custom button
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::a('New',['/pay-sbnk/create-new','upf' =>$model->empUPFNo]);
                }
            ]
            ],
        ],
    ]); ?>


</div>
