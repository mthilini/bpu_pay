<?php

use app\models\PayStax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PayStaxSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pay Staxes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-stax-index">

    <p>
        <?= Html::a('Create Pay Stax', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'label' => 'Emp. Name',
                'value' =>  function ($model) {
                    $employeemodel = new Employee();
                    $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                    return $employeeName;
                },
                'format' => 'raw',
            ],
            'staxRef',
            'staxFld',
            [
                'label' => 'Tax Field',
                'value' => 'staxFld0.taxDesc'
            ],
            'staxStart',
            'staxEnd',
            //'staxAmt',
            [
                'label' => 'Tax Amount',
                'attribute' => 'staxAmt',
                'format' => ['currency'],
            ],
            //'staxIncome',
            [
                'label' => 'Tax Income',
                'attribute' => 'staxIncome',
                'format' => ['currency'],
            ],

            'staxMoney',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PayStax $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>