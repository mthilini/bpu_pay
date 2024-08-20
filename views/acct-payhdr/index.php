<?php

use app\models\AcctPayhdr;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AcctPayhdrSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Acct Payhdrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acct-payhdr-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Acct Payhdr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'payDate',
            'payVch',
            'payCashBk',
            'payPrepared',
            //'payDatePrepare',
            //'payCertify',
            //'payDateCertify',
            //'payAuthorise',
            //'payDateAuthorise',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AcctPayhdr $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
