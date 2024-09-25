<?php

use app\models\PaySded;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySdedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Standing Order Deductions';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-sded-index">

    <p>
        <?= Html::a('Add SO Deduction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'empUPFNo',
            //'empUPFNo',
            [
                //'attribute' => 'empUPFNo',
                'label' => 'Emp. Name',
                'value' =>  function ($model) {
                    $employeemodel = new Employee();
                    $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                    return $employeeName;
                },
                'format' => 'raw',
            ],
            'sdedRef',
            'sdedFld',
            [
                'label' => 'SO Ded. Field',
                'value' => 'payField0.fldName'
            ],
            // 'sdedStart',
            [
                'attribute' => 'SO Ded. Start',
                'value' =>  function ($model) {
                    $sdedStart = date("d/m/Y", strtotime($model->sdedStart));
                    return $sdedStart;
                },
                'format' => 'raw',
            ],
            // 'sdedEnd',
            [
                'attribute' => 'SO Ded. End',
                'value' =>  function ($model) {
                    $sdedEnd = date("d/m/Y", strtotime($model->sdedEnd));
                    return $sdedEnd;
                },
                'format' => 'raw',
            ],
            //'sdedAmt',
            [
                'label' => 'Amount (Rs.)',
                'attribute' => 'sdedAmt',
                //'contentOptions' => ['class' => 'col-lg-1'],
                'format' => ['currency'],
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PaySded $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>