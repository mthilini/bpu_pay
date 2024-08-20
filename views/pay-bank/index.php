<?php

use app\models\PayBank;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PayBankSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bank Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-bank-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create New Bank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'bankCode',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],
            [
                'attribute' =>'bankBranch',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:150px;']
            ],
            [
                'attribute' =>'bankBank',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:200px;']
            ],
            [
                'attribute' =>'bankName',
                'contentOptions' => ['style' => 'font-size:14px;display:table-cell;width:400px;']
            ],
            //'bankAddr',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PayBank $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
