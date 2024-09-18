<?php

use app\models\PaySeml;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Employee;

/** @var yii\web\View $this */
/** @var app\models\PaySemlSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Standing Order Allowances';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pay-seml-index">

    <p>
        <?= Html::a('Add SO Allowance', ['create'], ['class' => 'btn btn-success']) ?>
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
            'semlRef',
            //'semlFld',
            [
                'label' => 'SO Allow. Field',
                'value' => 'payField0.fldName'
            ],
            'semlStart',
            'semlEnd',
            //'semlAmt',
            [
                'label' => 'Amount',
                'attribute' => 'semlAmt',
                'format' => ['currency'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PaySeml $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>