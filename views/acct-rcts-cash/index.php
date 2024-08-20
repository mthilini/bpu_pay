<?php

use app\models\AcctRctsCash;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctRctsCashSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Receipts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-rcts-cash-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Receipt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'rctDate',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'rctNo',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'rctSub',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:50px;']
            ],
            [
                'attribute' =>'rctName',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:200px;']
            ],
            [
                'attribute' =>'rctType',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'rctAmount',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],
            [
                'attribute' =>'rctRmks',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],
            [
                'attribute' =>'rctCashBk',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:5px;']
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctRctsCash $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
