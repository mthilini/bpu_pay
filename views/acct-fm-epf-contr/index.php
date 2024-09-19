<?php

use app\models\AcctFmEpfContr;
use app\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PayFmEpfContrSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employee EPF Contribution';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="acct-fm-epf-contr-index">

    <p>
        <?= Html::a('New EPF Opening Balance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'empUPFNo',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'label' => 'Emp. Name',
                'value' =>  function ($model) {
                    $employeemodel = new Employee();
                    $employeeName = $employeemodel->getEmpName($model->empUPFNo);
                    return $employeeName;
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:350px;']
            ],
            [
                'attribute' => 'epfYear',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' => 'epfBalStart',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:200px;text-align:right;'],
                //['format'=>'number', 'decimals'=>2, 'decPoint'=>'.', 'thousandSep'=>','], 
                'format' => ['currency'],
            ],
            //'epfJan10',
            //'epfJan15',
            //'epfFeb10',
            //'epfFeb15',
            //'epfMar10',
            //'epfMar15',
            //'epfApr10',
            //'epfApr15',
            //'epfMay10',
            //'epfMay15',
            //'epfJun10',
            //'epfJun15',
            //'epfJul10',
            //'epfJul15',
            //'epfAug10',
            //'epfAug15',
            //'epfSep10',
            //'epfSep15',
            //'epfOct10',
            //'epfOct15',
            //'epfNov10',
            //'epfNov15',
            //'epfDec10',
            //'epfDec15',
            //'epfIntrRate',
            //'epfInterest',
            [
                'attribute' => 'epfBalEnd',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:200px;text-align:right;'],
                'format' => ['currency'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctFmEpfContr $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>