<?php

use app\models\AcctPaycash;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctPaycashSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-paycash-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('New Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'payDate',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'payVch',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'paySub',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:50px;']
            ],
            [
                'attribute' =>'payPayee',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:200px;']
            ],
            [
                'attribute' =>'payType',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:100px;']
            ],
            [
                'attribute' =>'payAmount',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],
            [
                'attribute' =>'payRmks',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],
            [
                'attribute' =>'payCashBk',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:5px;']
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctPaycash $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
